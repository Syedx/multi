@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Product</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                        <form action="{{route('product.store')}}" method="post">
                            @csrf
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Product's Title" name="title" value="{{old('title')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="summary">Summary</label>
                                    <textarea id="summary" class="form-control" rows="8" placeholder="Summary's Summary..." name="summary" required>{{old('summary')}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" rows="8" placeholder="Banner's Description..." name="description" required>{{old('description')}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="stock">Stock<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" placeholder="Product's Stock" name="stock" value="{{old('stock')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="price">Price<span class="text-danger">*</span></label>
                                    <input type="number" step="any" class="form-control" placeholder="Product's Price" name="price" value="{{old('price')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input type="number" step="any" class="form-control" placeholder="Product's Discount" name="discount" value="{{old('discount')}}" required>
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
                                        <input id="thumbnail" class="form-control" type="text" name="photo">
                                      </div>
                                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="brand">Brand<span class="text-danger">*</span></label>
                                <select id="brand_id" name="brand_id" class="form-control show-tick">
                                    <option value=""></option>
                                    @foreach (\App\Models\Brand::get() as $brand)
                                        <option value="{{$brand->id}}" {{old('brand_id')==$brand->id ? 'selected' : ''}}>{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="">Category</label>
                                <select id="cat_id" name="cat_id" class="form-control show-tick">
                                    <option value=""></option>
                                    @foreach(\App\Models\Category::where('is_parent', 1)->get() as $cat)
                                        <option value="{{$cat->id}}" {{old('cat_id')==$cat->id ? 'selected' : ''}}>{{$cat->title}}</option>
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
                                    <option value="S" {{old('size')=='S' ? 'selected' : ''}}>Small</option>
                                    <option value="M" {{old('size')=='M' ? 'selected' : ''}}>Medium</option>
                                    <option value="L" {{old('size')=='L' ? 'selected' : ''}}>Large</option>
                                    <option value="XL" {{old('size')=='XL' ? 'selected' : ''}}>Extra Large</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="">Type<span class="text-danger">*</span></label>
                                <select name="type" class="form-control show-tick">
                                    <option value=""></option>
                                    <option value="new" {{old('type')=='new' ? 'selected' : ''}}>New</option>
                                    <option value="popular" {{old('type')=='popular' ? 'selected' : ''}}>Popular</option>
                                    <option value="winter" {{old('type')=='winter' ? 'selected' : ''}}>Winter</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="status">Status<span class="text-danger">*</span></label>
                                <select name="status" class="form-control show-tick">
                                    <option value=""></option>
                                    <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="vendor">Vendor<span class="text-danger">*</span></label>
                                <select name="vendor_id" class="form-control show-tick">
                                    <option value=""></option>
                                    @foreach (\App\Models\User::where('role', 'vendor')->get() as $vendor)
                                        <option value="{{$vendor->id}}" {{old('vendor_id')==$vendor->id ? 'selected' : ''}}>{{$vendor->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br><br>
                            <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                                html_option +="<option value='"+id+"'>"+title+"</option>"
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
    </script>
@endsection
