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

    {{-- Checkout Step Area --}}
    <div class="checkout_steps_area">
        <a class="active" href=""><i class="icofont-check-circled"></i> Billing</a>
        <a href=""><i class="icofont-check-circled"></i> Shipping</a>
        <a href="checkout-2.html"><i class="icofont-check-circled"></i> Payment</a>
        <a href="checkout-2.html"><i class="icofont-check-circled"></i> Review</a>
    </div>

    {{-- Checkout Area --}}
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <form action="{{route('checkout1.store')}}" method="post">
                    @csrf
                    <div class="col-12">
                        <div class="checkout_details_area clearfix">
                            <h5 class="mb-4">Billing Details</h5>
                                <div class="row">
                                    @php
                                        $name=explode(' ',$user->full_name);
                                    @endphp
                                    <div class="col-md-6 mb-3">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="{{$name[0]}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{$name[1]}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email_address">Email Address</label>
                                        <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" value="{{$user->email}}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="number" class="form-control" id="phone" min="0" placeholder="Phone Number" name="phone" value="{{$user->phone}}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" id="state" placeholder="State" value="{{$user->state}}" name="state">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city">Town/City</label>
                                        <input type="text" class="form-control" id="city" placeholder="Town/City" value="{{$user->city}}" name="city">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="street_address">Street Address</label>
                                        <input type="text" class="form-control" id="address" placeholder="Street Address" value="{{$user->address}}" name="address">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="postcode">Postcode/Zip</label>
                                        <input type="text" class="form-control" id="postcode" placeholder="Postcode/Zip" value="{{$user->postcode}}" name="postcode">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="order-notes">Order Notes</label>
                                        <textarea class="form-control" id="note" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery." name="note">{{$user->note}}</textarea>
                                    </div>
                                </div>

                                {{-- Different Shipping Address --}}
                                <div class="different-address mt-50">
                                    <div class="ship-different-title mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Ship to a same address?</label>
                                        </div>
                                    </div>
                                    <div class="row ahipping_input_field">
                                        <div class="col-md-6 mb-3">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="sfirst_name" name="sfirst_name" placeholder="First Name" value="{{$name[0]}}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="first_name">Last Name</label>
                                            <input type="text" class="form-control" id="slast_name" name="slast_name" placeholder="Last Name" value="{{$name[1]}}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email_address">Email Address</label>
                                            <input type="text" class="form-control" id="semail" placeholder="Email Address" name="semail" value="{{$user->email}}" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="number" class="form-control" id="sphone" min="0" placeholder="Phone Number" name="sphone" value="{{$user->phone}}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="scountry" name="scountry" value="{{$user->scountry}}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="sstate" placeholder="State" value="{{$user->sstate}}" name="sstate">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="city">Town/City</label>
                                            <input type="text" class="form-control" id="scity" placeholder="Town/City" value="{{$user->scity}}" name="scity">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="street_address">Street Address</label>
                                            <input type="text" class="form-control" id="saddress" placeholder="Street Address" value="{{$user->saddress}}" name="saddress">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="postcode">Postcode/Zip</label>
                                            <input type="text" class="form-control" id="spostcode" placeholder="Postcode/Zip" value="{{$user->spostcode}}" name="spostcode">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="checkout_pagination d-flex justify-content-end mt-50">
                            <a href="{{route('cart')}}" class="btn btn-primary mt-2 ml-2">Go Back</a>
                            <button type="submit" class="btn btn-primary mt-2 ml-2">Continue</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#customCheck1').on('change',function (e) {
            e.preventDefault();
            if(this.checked){
                $('#sfirst_name').val($('#first_name').val());
                $('#slast_name').val($('#last_name').val());
                $('#semail').val($('#email').val());
                $('#sphone').val($('#phone').val());
                $('#scountry').val($('#country').val());
                $('#sstate').val($('#state').val());
                $('#scity').val($('#city').val());
                $('#saddress').val($('#address').val());
                $('#spostcode').val($('#postcode').val());
            }
            else{
                $('#sfirst_name').val("");
                $('#slast_name').val("");
                $('#semail').val("");
                $('#sphone').val("");
                $('#scountry').val("");
                $('#sstate').val("");
                $('#scity').val("");
                $('#saddress').val("");
                $('#spostcode').val("");
            }
        })
    </script>
@endsection
