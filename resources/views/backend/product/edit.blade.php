@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Product</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <form action="{{route('product.update', $product->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Product's Title" name="title" value="{{$product->title}}" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="summary">Summary</label>
                                    <textarea id="summary" class="form-control" rows="8" placeholder="Summary's Summary..." name="summary" required>{{$product->summary}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" rows="8" placeholder="Banner's Description..." name="description" required>{{$product->description}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="stock">Stock<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" placeholder="Product's Stock" name="stock" value="{{$product->stock}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="price">Price<span class="text-danger">*</span></label>
                                    <input type="number" step="any" class="form-control" placeholder="Product's Price" name="price" value="{{$product->price}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input type="number" step="any" class="form-control" placeholder="Product's Discount" name="discount" value="{{$product->discount}}" required>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                          </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
                                      </div>
                                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="brand">Brand<span class="text-danger">*</span></label>
                                <select id="brand_id" name="brand_id" class="form-control show-tick">
                                    <option value=""></option>
                                    @foreach (\App\Models\Brand::get() as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id==$product->brand_id? 'selected' : ''}}>{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="">Category</label>
                                <select id="cat_id" name="cat_id" class="form-control show-tick">
                                    <option value=""></option>
                                    @foreach(\App\Models\Category::where('is_parent', 1)->get() as $cat)
                                        <option value="{{$cat->id}}"  {{$cat->id==$product->cat_id? 'selected' : ''}}>{{$cat->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 d-none" id="child_cat_div">
                                <label for="type">Child Category</label>
                                <select id="child_cat_id" name="child_cat_id" class="form-control show-tick">
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="">Size<span class="text-danger">*</span></label>
                                <select name="size" class="form-control show-tick">
                                    <option value=""></option>
                                    <option value="S" {{$product->size=='S' ? 'selected' : ''}}>Small</option>
                                    <option value="M" {{$product->size=='M' ? 'selected' : ''}}>Medium</option>
                                    <option value="L" {{$product->size=='L' ? 'selected' : ''}}>Large</option>
                                    <option value="XL" {{$product->size=='XL' ? 'selected' : ''}}>Extra Large</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="">Type<span class="text-danger">*</span></label>
                                <select name="type" class="form-control show-tick">
                                    <option value=""></option>
                                    <option value="new" {{$product->type=='new' ? 'selected' : ''}}>New</option>
                                    <option value="popular" {{$product->type=='popular' ? 'selected' : ''}}>Popular</option>
                                    <option value="winter" {{$product->type=='winter' ? 'selected' : ''}}>Winter</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="vendor">Vendor<span class="text-danger">*</span></label>
                                <select name="vendor" class="form-control show-tick">
                                    <option value=""></option>
                                    @foreach (\App\Models\User::where('role', 'vendor')->get() as $vendor)
                                        <option value="{{$vendor->id}}" {{$vendor->id==$product->vendor_id? 'selected' : ''}}>{{$vendor->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br><br>
                            <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
         $('#lfm').filemanager('image');
    </script>

    <script>
        $(document).ready(function() {
            $('#summary').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>

    <script>

        var child_cat_id={{$product->child_cat_id}};
        $('#cat_id').change(function(){
            var cat_id=$(this).val();

            if(cat_id !=null){
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}",
                        cat_id:cat_id,
                    },
                    success:function(response){
                        var html_option="<option value=''></option>"
                        if(response.status){
                            $('#child_cat_div').removeClass('d-none');
                            $.each(response.data, function(id, title){
                                html_option +="<option value='"+id+"'"+(child_cat_id==id ? 'selected' : '')+">"+title+"</option>"
                            });
                        }
                        else{
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            }
        });

        if(child_cat_id !=null){
            $('#cat_id').change();
        }
    </script>
@endsection
