@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>All Shippings</h2>
                    <ul class="breadcrumb float-left">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Shipping Management</li>
                        <li class="breadcrumb-item active">All Shippings</li>
                    </ul>
                    <br><br>
                    <a class="btn btn-sm btn btn-outline-secondary" href="{{route('shipping.create')}}"><i class="icon-plus">Create Shipping</i></a>

                    <p class="float-right">Total Banners: {{\App\Models\Shipping::count()}}</p>
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
                        <h2><strong>Shipping list</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Shipping Address</th>
                                        <th>Delivery Time</th>
                                        <th>Delivery Charge</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Shipping Address</th>
                                        <th>Delivery Time</th>
                                        <th>Delivery Charge</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($shippings as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->shipping_address}}</td>
                                            <td>{{$item->delivery_time}}</td>
                                            <td>{{number_format($item->delivery_charge,2)}}</td>
                                            <td>
                                                <input type="checkbox" name="toggle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                                            </td>
                                            <td>
                                                <a href="{{route('shipping.edit', $item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-primary" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                                <form class="float-left ml-2" action="{{route('shipping.destroy', $item->id)}}" method="post">
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
                text: "Once deleted, you will not be able to recover this shipping!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Poof! Your shipping has been deleted!", {
                    icon: "success",
                    });
                } else {
                    swal("Your shipping is safe!");
                }
                });
        });
    </script>

    <script>
        $('input[name=toggle]').change(function() {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            $.ajax({
                url:"{{route('shipping.status')}}",
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
