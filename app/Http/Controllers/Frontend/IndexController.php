<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function home()
    {
        $banners=Banner::where(['status'=>'active', 'type'=>'banner'])->orderBy('id', 'DESC')->Limit('5')->get();
        $categories=Category::where(['status'=>'active', 'is_parent'=>1])->limit(3)->orderBy('id', "DESC")->get();
        return view('frontend.index', compact(['banners', 'categories']));
    }

    public function productCategory(Request $request,$slug)
    {
        $categories=Category::with('products')->where('slug',$slug)->first();

        $sort='';
        if($request->sort !=null){
            $sort=$request->sort;
        }
        if($categories==null){
            return view('errors.404');
        }
        else{
            if($sort=='priceAsc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('offer_price','ASC')->paginate(4);
            }
            elseif($sort=='priceDesc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('offer_price','DESC')->paginate(4);
            }
            elseif($sort=='discAsc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('price','ASC')->paginate(4);
            }
            elseif($sort=='discDesc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('price','DESC')->paginate(4);
            }
            elseif($sort=='titleAsc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','ASC')->paginate(4);
            }
            elseif($sort=='titleDesc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','DESC')->paginate(4);
            }
            else{
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->paginate(4);
            }
        }
        $route='product-category';

        if($request->ajax()){
            $view=view('frontend.layouts._single-product',compact('products'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('frontend.pages.product.product-category',compact(['categories','route','products']));
    }

    public function productDetail($slug)
    {
        $product=Product::with('rel_prods')->where('slug',$slug)->first();
        if($product){
            return view('frontend.pages.product.product-detail',compact('product'));
        }
        else{
            return "Product detail not found";
        }
    }

    public function userAuth()
    {
        Session::put('url.intended',URL::previous());
        return view('frontend.auth.auth');
    }

    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email'=>'email|required|exists:users,email',
            'password'=>'required|min:4',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=>'active']))
        {
            Session::put('user',$request->email);

            if(Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'));
            }
            else{
                return redirect()->route('home')->with('success', 'Successfully logged in!');
            }
        }
        else{
            return back()->with('error','Invalid email & password!');
        }
    }

    public function registerSubmit(Request $request){
        $this->validate($request, [
            'username'=>'nullable|string',
            'full_name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'min:4|required|confirmed',
        ]);
        $data=$request->all();
        $check=$this->create($data);
        Session::put('user',$data['email']);
        Auth::login($check);
        if($check){
            return redirect()->route('home')->with('success','Successfully registered');
        }
        else{
            return back()->with('error',['Please check your credentials']);
        }
    }

    private function create(array $data){
        return User::create([
            'full_name'=>$data['full_name'],
            'username'=>$data['username'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);
    }

    public function userLogout(){
        Session::forget('user');
        Auth::logout();
        return redirect()->home()->with('success','Successfully logged out!');
    }

    public function userDashboard(){
        $user=Auth::user();
        return view('frontend.user.dashboard',compact('user'));
    }

    public function userOrder(){
        $user=Auth::user();
        return view('frontend.user.order', compact('user'));
    }

    public function userAddress(){
        $user=Auth::user();
        return view('frontend.user.address',compact('user'));
    }

    public function userAccount(){
        $user=Auth::user();
        return view('frontend.user.account',compact('user'));
    }

    public function billingAddress(Request $request, $id){
        $user=User::where('id',$id)->update([
            'country'=>$request->country,
            'city'=>$request->city,
            'postcode'=>$request->postcode,
            'address'=>$request->address,
            'state'=>$request->state,
        ]);
        if($user){
            return back()->with('success', 'Address succcessfully updated!');
        }
        else{
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function shippingAddress(Request $request, $id){
        $user=User::where('id',$id)->update([
            'scountry'=>$request->scountry,
            'scity'=>$request->scity,
            'spostcode'=>$request->spostcode,
            'saddress'=>$request->saddress,
            'sstate'=>$request->sstate,
        ]);
        if($user){
            return back()->with('success', 'Shipping Address succcessfully updated!');
        }
        else{
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function updateAccount(Request $request, $id){
        $this->validate($request, [
            'oldpassword'=>'nullable|min:4',
            'newpassword'=>'nullable|min:4',
            'full_name'=>'required|string',
            'username'=>'nullable|string',
            'phone'=>'nullable|min:8',
        ]);
        $hashpassword=Auth::user()->password;

        if($request->oldpassword==null && $request->newpassword==null){
            User::where('id',$id)->update([
                'full_name'=>$request->full_name,
                'username'=>$request->username,
                'phone'=>$request->phone,
            ]);
            return back()->with('success', 'Account successfully updated!');
        }
        else{
            if(Hash::check($request->oldpassword,$hashpassword)){
                if(!Hash::check($request->newpassword,$hashpassword)){
                    User::where('id',$id)->update([
                        'full_name'=>$request->full_name,
                        'username'=>$request->username,
                        'phone'=>$request->phone,
                        'password'=>Hash::make($request->newpassword),
                    ]);
                    return back()->with('success', 'Account successfully updated!');
                }
                else{
                    return back()->with('error', 'New pasword can not be same as the old password!');
                }

            }
            else{
                return back()->with('error', 'Old password does not match!');
            }
        }

    }


}
