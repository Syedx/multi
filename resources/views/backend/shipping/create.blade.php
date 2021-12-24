@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Shippings</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Shipping Management</li>
                        <li class="breadcrumb-item active">Add Shippings</li>
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
                        <form action="{{route('shipping.store')}}" method="post">
                            @csrf
                            <div class="col-lg-12 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="shipping_address">Shipping Address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Shipping Address..." name="shipping_address" value="{{old('shipping_address')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="delivery_time">Delivery Time<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Delivery Time" name="delivery_time" value="{{old('delivery_time')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="delivery_charge">Delivery Charge</label>
                                    <input type="number" step="any" class="form-control" placeholder="Delivery Charge" name="delivery_charge" value="{{old('delivery_charge')}}" required>
                                </div>
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
            $('#shipping_address').summernote();
        });
    </script>
@endsection
