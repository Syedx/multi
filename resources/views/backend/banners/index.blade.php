@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>All Banners</h2>
                    <ul class="breadcrumb float-left">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Banner Management</li>
                        <li class="breadcrumb-item active">All Banners</li>
                    </ul>
                    <br><br>
                    <a class="btn btn-sm btn btn-outline-secondary" href="{{route('banner.create')}}"><i class="icon-plus">Create Banner</i></a>

                    <p class="float-right">Total Banners: {{\App\Models\Banner::count()}}</p>
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
                        <h2><strong>Banner list</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($banners as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{!! html_entity_decode($item->description) !!}</td>
                                            <td><img src="{{$item->photo}}" alt="banner image" style="max-height: 90px; max-width: 120px"></td>
                                            <td>
                                                @if($item->type=='banner')
                                                    <span class="badge badge-success">{{$item->type}}</span>
                                                @else
                                                    <span class="badge badge-primary">{{$item->type}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toggle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                                            </td>
                                            <td>
                                                <a href="{{route('banner.edit', $item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-primary" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                                <form class="float-left ml-2" action="{{route('banner.destroy', $item->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fas fa-trash-alt"></i></a>
                                                </form>
                                            </td>
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
                text: "Once deleted, you will not be able to recover this banner!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Poof! Your banner has been deleted!", {
                    icon: "success",
                    });
                } else {
                    swal("Your banner is safe!");
                }
                });
        });
    </script>

    <script>
        $('input[name=toggle]').change(function() {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            $.ajax({
                url:"{{route('banner.status')}}",
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
