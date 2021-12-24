@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>All Users</h2>
                    <ul class="breadcrumb float-left">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">User Management</li>
                        <li class="breadcrumb-item active">All Users</li>
                    </ul>
                    <br><br>
                    <a class="btn btn-sm btn btn-outline-secondary" href="{{route('user.create')}}"><i class="icon-plus">Create User</i></a>

                    <p class="float-right">Total Users: {{\App\Models\User::count()}}</p>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                @include('backend.layouts.notification')
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>User list</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Photo</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Photo</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img src="{{$item->photo}}" alt="User image" style="border-radius: 50%; max-height: 90px; max-width: 120px"></td>
                                            <td>{{$item->full_name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>
                                                @if($item->role=='admin')
                                                    <span class="badge badge-danger">{{$item->role}}</span>
                                                @elseif($item->role=='vendor')
                                                    <span class="badge badge-primary">{{$item->role}}</span>
                                                @else
                                                    <span class="badge badge-warning">{{$item->role}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toggle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#userID{{$item->id}}" data-toggle="tooltip" title="view" class="float-left btn btn-sm btn-outline-secondary" data-placement="bottom"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('user.edit', $item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-primary" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                                <br><br><br>
                                                <form action="{{route('user.destroy', $item->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fas fa-trash-alt"></i></a>
                                                </form>
                                            </td>
                                                {{-- Modal --}}
                                                    <div class="modal fade" id="userID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            @php
                                                                $user=\App\Models\User::where('id', $item->id)->first();
                                                            @endphp
                                                        <div class="modal-content">
                                                            <div class="text-center">
                                                                <img src="{{$user->photo}}" style="border-radius: 50%; margin-top: 5%; width: 150px;" alt="">
                                                            </div>
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" text-center id="exampleModalLongTitle">{{$user->full_name}}</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <strong>Username: </strong>
                                                                <p>{{$user->username}}</p>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <strong>Email: </strong>
                                                                        <p>{{$item->email}}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <strong>Phone: </strong>
                                                                        <p>{{$item->phone}}</p>
                                                                    </div>
                                                                </div>

                                                                <strong>Address: </strong>
                                                                <p>{{$item->address}}</p>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <strong>Role: </strong>
                                                                        <p>@if($item->role=='admin')
                                                                            <span class="badge badge-danger">{{$item->role}}</span>
                                                                        @elseif($item->role=='vendor')
                                                                            <span class="badge badge-primary">{{$item->role}}</span>
                                                                        @else
                                                                            <span class="badge badge-warning">{{$item->role}}</span>
                                                                        @endif</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <strong>Status: </strong>
                                                                        <p>
                                                                            @if($item->status=='active')
                                                                                <span class="badge badge-success">{{$item->status}}</span>
                                                                            @else
                                                                                <span class="badge badge-danger">{{$item->status}}</span>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                {{-- -- --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function (e) {
            var form=$(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this User!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Poof! Your User has been deleted!", {
                    icon: "success",
                    });
                } else {
                    swal("Your User is safe!");
                }
                });
        });
    </script>

    <script>
        $('input[name=toggle]').change(function() {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            $.ajax({
                url:"{{route('user.status')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function (response) {
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('Please try again!');
                    }
                }
            })
        });
    </script>
@endsection
