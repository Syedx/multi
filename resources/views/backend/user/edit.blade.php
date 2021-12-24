@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit User</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                        <form action="{{route('user.update', $user->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full name" name="full_name" value="{{$user->full_name}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{$user->email}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="phone" class="form-control" placeholder="Phone No." name="phone" value="{{$user->phone}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{$user->address}}">
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose profile picture
                                          </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}">
                                      </div>
                                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="">Role<span class="text-danger">*</span></label>
                                <select name="role" class="form-control show-tick">
                                    <option value=""></option>
                                    <option value="admin" {{$user->role=='admin' ? 'selected' : ''}}>Admin</option>
                                    <option value="vendor" {{$user->role=='vendor' ? 'selected' : ''}}>Vendor</option>
                                    <option value="customer" {{$user->role=='customer' ? 'selected' : ''}}>Customer</option>
                                </select>
                            </div>

                            <br><br><br>
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
            $('#description').summernote();
        });
    </script>
@endsection
