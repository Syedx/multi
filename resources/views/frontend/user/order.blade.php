@extends('frontend.layouts.master')

@section('content')
    {{-- Breadcumb Area  --}}
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>My Account</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">My Orders list</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- End Breadcumb Area  --}}

    {{-- End My Account Area --}}
    <section class="my-account-area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="my-account-navigation mb-50">
                        @include('frontend.user.sidebar')
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="my-account-content mb-50">
                        <div class="cart-table">
                            <div class="table-responsive" >
                                <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">Order</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status Size</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <th scope="row">
                                            #2257
                                        </th>
                                        <td>
                                            Pending
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End My Account Area --}}

@endsection
