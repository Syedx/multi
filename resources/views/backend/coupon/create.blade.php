@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Coupon</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Coupons</li>
                        <li class="breadcrumb-item active">Add Coupon</li>
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
                        <form action="{{route('coupon.store')}}" method="post">
                            @csrf
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="title">Coupon Code</label>
                                    <input type="text" class="form-control" placeholder="eg. SNOOFY10" name="code" value="{{old('code')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="title">Coupon Value</label>
                                    <input type="text" class="form-control" placeholder="eg. 10%" name="value" value="{{old('value')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="type">Type<span class="text-danger">*</span></label>
                                <select name="type" class="form-control show-tick">
                                    <option value=""></option>
                                    <option value="fixed" {{old('type')=='fixed' ? 'selected' : ''}}>Fixed</option>
                                    <option value="percent" {{old('type')=='percent' ? 'selected' : ''}}>Percent</option>
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

                            <br><br><br>
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
            $('#description').summernote();
        });
    </script>
@endsection
