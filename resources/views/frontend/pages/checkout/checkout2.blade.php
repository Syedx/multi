@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Checkout</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    {{-- Checkout Steps Area --}}
    <div class="checkout_steps_area">
        <a class="complated" href="{{route('checkout1')}}"><i class="icofont-check-circled"></i> Billing</a>
        <a class="active" href=""><i class="icofont-check-circled"></i> Shipping</a>
        <a href=""><i class="icofont-check-circled"></i> Payment</a>
        <a href=""><i class="icofont-check-circled"></i> Review</a>
    </div>

    {{-- Checkout Area --}}
    <div class="checkout_area section_padding_100">
        <div class="container">
            <form action="{{route('checkout2.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="checkout_details_area clearfix">
                            <h5 class="mb-4">Shipping Method</h5>
                            <div class="shipping_method">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Method</th>
                                                <th scope="col">Delivery Time</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Choose</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($shippings)>0)
                                                @foreach ($shippings as $key=>$item)
                                                    <tr>
                                                        <th scope="row">{{$item->shipping_address}}</th>
                                                        <td>{{$item->delivery_time}}</td>
                                                        <td>{{number_format($item->delivery_charge,2)}}</td>
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio{{$key}}" name="delivery_charge" value="{{$item->delivery_charge}}" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio{{$key}}"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <td colspan="3">No Shipping method found!</td>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="checkout_pagination d-flex justify-content-end mt-50">
                            <a href="{{route('checkout1')}}" class="btn btn-primary mt-2 ml-2">Go Back</a>
                            <button type="submit" class="btn btn-primary mt-2 ml-2">Continue</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
