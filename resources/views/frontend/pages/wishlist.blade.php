@extends('frontend.layouts.master')


@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Wishlist</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Wishlist Table Area -->
    <div class="wishlist-table section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table wishlist-table">
                        <div class="table-responsive" id="wishlist_list">
                            @include('frontend.layouts._wishlist')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Table Area -->
@endsection

@section('scripts')
    <script>
        $(document).on('click','.move-to-cart',function (e) {
            e.preventDefault();
            var rowId=$(this).data('id');
            var token="{{csrf_token()}}";
            var path="{{route('wishlist.move.cart')}}";

            $.ajax({
                url:path,
                type:"POST",
                data:{
                    _token:token,
                    rowId:rowId,
                },
                beforeSend:function(){
                    $(this).html('<i class="fas fa-spinner fa-spin"></i> Moving to Cart...');
                },
                success:function (data) {
                    if(data['status']){
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #wishlist_list').html(data['wishlist_list']);
                        $('body #header-ajax').html(data['header']);
                        swal({
                        title: "Success!",
                        text: data['message'],
                        icon: "success",
                        button: "Ok!",
                        });
                    }
                    else{
                        swal({
                            title: "Oops!",
                            text: data['message'],
                            icon: "warning",
                            button: "Ok!",
                        });
                    }
                },
                error:function (error) {
                    swal({
                            title: "Sorry!",
                            text: "Couldn't move to cart",
                            icon: "error",
                            button: "Ok!",
                        });
                }
            })

        })
    </script>

    <script>
        $(document).on('click','.delete_wishlist',function (e) {
            e.preventDefault();
            var rowId=$(this).data('id');
            var token="{{csrf_token()}}";
            var path="{{route('wishlist.delete')}}";

            $.ajax({
                url:path,
                type:"POST",
                data:{
                    _token:token,
                    rowId:rowId,
                },
                success:function (data) {
                    if(data['status']){
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #wishlist_list').html(data['wishlist_list']);
                        $('body #header-ajax').html(data['header']);
                        swal({
                        title: "Success!",
                        text: data['message'],
                        icon: "success",
                        button: "Ok!",
                        });
                    }
                    else{
                        swal({
                            title: "Oops!",
                            text: data['message'],
                            icon: "warning",
                            button: "Ok!",
                        });
                    }
                },
                error:function (error) {
                    swal({
                            title: "Sorry!",
                            text: "Couldn't move to cart",
                            icon: "error",
                            button: "Ok!",
                        });
                }
            })

        })
    </script>
@endsection
