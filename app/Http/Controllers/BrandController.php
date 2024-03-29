<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::orderBy('id', 'DESC')->get();
        return view('backend.brand.index', compact('brands'));
    }

    public function brandStatus(Request $request)
    {
        if($request->mode=='true'){
            DB::table('brands')->where('id', $request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('brands')->where('id', $request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Status updated successfully', 'status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'nullable|unique,string',
            'photo'=>'required',
            'status'=>'nullable|in:active, inactive',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->input('title'));
        $slug_count=Brand::where('slug', $slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        $status=Brand::create($data);
        if($status){
            return redirect()->route('brand.index')->with('success', 'Brand added successfully');
        }
        else{
            return back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands=Brand::find($id);
        if($brands){
            return view('backend.brand.edit', compact('brands'));
        }
        else{
            return back()->with('error', 'Data not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brands=Brand::find($id);
        if($brands){
            $this->validate($request, [
                'title'=>'nullable|required',
                'photo'=>'required',
                'status'=>'nullable|in:active, inactive',
            ]);

            $data=$request->all();

            $status=$brands->fill($data)->save();
            if($status){
                return redirect()->route('brand.index')->with('success', 'Brand updated successfully');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error', 'Data not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brands=Brand::find($id);
        if($brands){
            $status=$brands->delete();
            if($status){
                return redirect()->route('brand.index')->with('success', 'Brand deleted successfully');
            }
            else{
                return back()->with('error', 'Something went wrong!');
            }
        }
        else{
            return back()->with('error', 'Data not found');
        }
    }
}
