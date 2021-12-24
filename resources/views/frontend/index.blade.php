@extends('frontend.layouts.master')

@section('content')

    @if(count($banners)>0)
        <!-- Welcome Slides Area -->
        <section class="welcome_area">
            <div class="welcome_slides owl-carousel">
                <!-- Single Slide -->
                @foreach ($banners as $banner)
                    <div class="single_slide bg-img" style="background-image: url({{$banner->photo}});">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="welcome_slide_text">
                                        <h2 class="text-white" data-animation="fadeInUp"
                                            data-delay="600ms">{{$banner->title}}</h2>
                                        <h4 class="text-white" data-animation="fadeInUp"
                                            data-delay="600ms">{!! html_entity_decode($banner->description) !!}</h4>
                                        <a href="{{$banner->slug}}" class="btn btn-primary" data-animation="fadeInUp"
                                            data-delay="900ms">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
                <!-- Welcome Slides Area -->

            <!-- Top Catagory Area -->
                @if(count($categories)>0)
                    <div class="top_catagory_area mt-50 clearfix">
                        <div class="container">
                            <div class="row">
                                    <!-- Single Catagory -->
                                @foreach ($categories as $cat)
                                    <div class="col-12 col-md-4">
                                        <div class="single_catagory mt-50">
                                            <a href="{{route('product.category',$cat->slug)}}">
                                                <img src="{{$cat->photo}}" alt="{{$cat->title}}">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            <!-- Top Catagory Area -->

                @php
                    $new_products=\App\Models\Product::where(['status'=>'active','type'=>'new'])->orderBy('id','DESC')->limit('10')->get();
                @endphp

                    <!-- New Arrivals Area -->
                    @if (count($new_products)>0)

                        <section class="new_arrivals_area section_padding_100 clearfix">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="popular_section_heading mb-50 text-center">
                                            <h5>New Arrivals</h5>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Product -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="new_arrivals_slides owl-carousel">
                                            @foreach ($new_products as $nproduct)
                                                <div class="single-product-area mb-30">
                                                    <div class="product_image">
                                                        <!-- Product Image -->
                                                        @php
                                                            $photo=explode(',',$nproduct->photo);
                                                        @endphp
                                                        <a href="{{route('product.detail',$nproduct->slug)}}">
                                                        <img class="normal_img" src="{{$photo[0]}}" alt="{{$nproduct->title}}">
                                                        </a>
                                                        <!-- Product Badge -->
                                                        <div class="product_badge">
                                                            <span>{{$nproduct->type}}</span>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="product_wishlist">
                                                            <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="1" id="add_to_wishlist_1"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="product_compare">
                                                            <a href="javascript:void(0);" class="add_to_compare" data-id="1" id="add_to_compare_1"><i class="icofont-exchange"></i></a>
                                                        </div>
                                                    </div>

                                                    <!-- Product Description -->
                                                    <div class="product_description">
                                                        <!-- Add to cart -->
                                                        <div class="product_add_to_cart">
                                                            <a href="javascript:void(0);" data-quantity="1" data-price="45.00" data-product-id="1" class="add_to_cart" id="add_to_cart1"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="product_quick_view">
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#quickview1"><i class="icofont-eye-alt"></i> Quick View</a>
                                                        </div>

                                                        <p class="brand_name">{{\App\Models\Brand::where('id',$nproduct->brand_id)->value('title')}}</p>
                                                        <a href="{{route('product.detail',$nproduct->slug)}}">{{ucfirst($nproduct->title)}}</a>
                                                        <h6 class="product-price">${{number_format($nproduct->offer_price,2)}}<small><del class="text-danger">${{number_format($nproduct->price,2)}}</del></small></h6>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    @endif
                <!-- New Arrivals Area -->

            <!-- Featured Products Area -->
            <section class="featured_product_area">
                <div class="container">
                    <div class="row">
                        <!-- Featured Offer Area -->
                        <!---->

                        <!-- Featured Product Area -->
                        <div class="col-12 col-lg-12">
                            <div class="section_heading featured">
                                <h5>Featured Products</h5>
                            </div>

                            <!-- Featured Product Slides -->
                            <div class="featured_product_slides owl-carousel">
                                <!-- Single Product -->
                                                            <!-- Single Product -->
                                        <div class="single-product-area mb-30">
                                            <div class="product_image">
                                                                                <!-- Product Image -->
                                                <img class="normal_img" src="frontend/img/product-img/new-7.png" alt="">
                                                <!-- Product Badge -->
                                                <div class="product_badge">
                                                    <span>new</span>
                                                </div>

                                                <!-- Wishlist -->
                                                <div class="product_wishlist">
                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="7" id="add_to_wishlist_7"><i class="icofont-heart"></i></a>
                                                </div>

                                                <!-- Compare -->
                                                <div class="product_compare">
                                                    <a href="javascript:void(0);" class="add_to_compare" data-id="7" id="add_to_compare_7"><i class="icofont-exchange"></i></a>
                                                </div>
                                            </div>

                                            <!-- Product Description -->
                                            <div class="product_description">
                                                <!-- Add to cart -->
                                                <div class="product_add_to_cart">
                                                    <a href="#" data-quantity="1" data-price="88.00" data-product-id="7" class="add_to_cart" id="add_to_cart7"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                                </div>

                                                <!-- Quick View -->
                                                <div class="product_quick_view">
                                                    <a href="#" data-toggle="modal" data-target="#quickview7"><i class="icofont-eye-alt"></i> Quick View</a>
                                                </div>

                                                <p class="brand_name">Rolex</p>
                                                <a href="product-detail/fashion-dress.html">Fashion Dress</a>
                                                <h6 class="product-price">$88.00 <small><del class="text-danger">$50.00</del></small></h6>

                                            </div>
                                        </div>

                                                            <!-- Single Product -->
                                        <div class="single-product-area mb-30">
                                            <div class="product_image">
                                                                                <!-- Product Image -->
                                                <img class="normal_img" src="frontend/img/product-img/new-4.png" alt="">
                                                <!-- Product Badge -->
                                                <div class="product_badge">
                                                    <span>new</span>
                                                </div>

                                                <!-- Wishlist -->
                                                <div class="product_wishlist">
                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="3" id="add_to_wishlist_3"><i class="icofont-heart"></i></a>
                                                </div>

                                                <!-- Compare -->
                                                <div class="product_compare">
                                                    <a href="javascript:void(0);" class="add_to_compare" data-id="3" id="add_to_compare_3"><i class="icofont-exchange"></i></a>
                                                </div>
                                            </div>

                                            <!-- Product Description -->
                                            <div class="product_description">
                                                <!-- Add to cart -->
                                                <div class="product_add_to_cart">
                                                    <a href="#" data-quantity="1" data-price="96.00" data-product-id="3" class="add_to_cart" id="add_to_cart3"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                                </div>

                                                <!-- Quick View -->
                                                <div class="product_quick_view">
                                                    <a href="#" data-toggle="modal" data-target="#quickview3"><i class="icofont-eye-alt"></i> Quick View</a>
                                                </div>

                                                <p class="brand_name">Rolex</p>
                                                <a href="product-detail/silk-dress.html">Silk Dress</a>
                                                <h6 class="product-price">$96.00 <small><del class="text-danger">$50.00</del></small></h6>

                                            </div>
                                        </div>

                                                            <!-- Single Product -->
                                        <div class="single-product-area mb-30">
                                            <div class="product_image">
                                                                                <!-- Product Image -->
                                                <img class="normal_img" src="frontend/img/product-img/new-1-back.png" alt="">
                                                <!-- Product Badge -->
                                                <div class="product_badge">
                                                    <span>new</span>
                                                </div>

                                                <!-- Wishlist -->
                                                <div class="product_wishlist">
                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="1" id="add_to_wishlist_1"><i class="icofont-heart"></i></a>
                                                </div>

                                                <!-- Compare -->
                                                <div class="product_compare">
                                                    <a href="javascript:void(0);" class="add_to_compare" data-id="1" id="add_to_compare_1"><i class="icofont-exchange"></i></a>
                                                </div>
                                            </div>

                                            <!-- Product Description -->
                                            <div class="product_description">
                                                <!-- Add to cart -->
                                                <div class="product_add_to_cart">
                                                    <a href="#" data-quantity="1" data-price="45.00" data-product-id="1" class="add_to_cart" id="add_to_cart1"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                                </div>

                                                <!-- Quick View -->
                                                <div class="product_quick_view">
                                                    <a href="#" data-toggle="modal" data-target="#quickview1"><i class="icofont-eye-alt"></i> Quick View</a>
                                                </div>

                                                <p class="brand_name">Rolex</p>
                                                <a href="product-detail/boutique-silk-dress.html">Boutique Silk Dress</a>
                                                <h6 class="product-price">$45.00 <small><del class="text-danger">$50.00</del></small></h6>

                                            </div>
                                        </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Featured Products Area -->

            <!-- Best Rated/Onsale/Top Sale Product Area -->
                <section class="best_rated_onsale_top_sellares section_padding_100_70">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="tabs_area">
                                <!-- Tabs -->
                                <ul class="nav nav-tabs" role="tablist" id="product-tab">
                                    <li class="nav-item">
                                        <a href="#top-sellers" class="nav-link " data-toggle="tab" role="tab">Top Selling Product</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#best-rated" class="nav-link active" data-toggle="tab" role="tab">Best
                                            Rated</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade" id="top-sellers">
                                        <div class="top_sellers_area">
                                            <div class="row">
                                                                                        <div class="col-12 col-sm-6 col-lg-4">
                                                    <div class="single_top_sellers">
                                                        <div class="top_seller_image">
                                                                                                                <img src="frontend/img/product-img/new-2.png" alt="Top-Sellers">
                                                        </div>
                                                        <div class="top_seller_desc">
                                                            <h5>Flower Textured Dress</h5>
                                                            <h6>$34.00 <span>$48.00</span></h6>
                                                            <div class="top_seller_product_rating">
                                                                                                                                                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                </div>

                                                            <!-- Info -->
                                                            <div
                                                                class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                                <!-- Add to cart -->
                                                                <div class="ts_product_add_to_cart">
                                                                    <a href="javascript:;" data-quantity="1" data-price="34.00" data-product-id="2" class="add_to_cart" id="add_to_cart2" data-toggle="tooltip" data-placement="top"
                                                                       title="Add To Cart"><i
                                                                            class="icofont-shopping-cart"></i></a>
                                                                </div>

                                                                <!-- Wishlist -->
                                                                <div class="ts_product_wishlist">
                                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="2" id="add_to_wishlist_2" data-toggle="tooltip"
                                                                       data-placement="top" title="Wishlist"><i
                                                                            class="icofont-heart"></i></a>
                                                                </div>

                                                                <!-- Compare -->
                                                                <div class="ts_product_compare">
                                                                    <a href="javascript:void(0);" class="add_to_compare" data-id="2" id="add_to_compare_2" data-toggle="tooltip"
                                                                       data-placement="top" title="Compare"><i
                                                                            class="icofont-exchange"></i></a>
                                                                </div>

                                                                <!-- Quick View -->
                                                                <div class="ts_product_quick_view">
                                                                    <a href="#" data-toggle="modal" data-target="#quickview2"><i
                                                                            class="icofont-eye-alt"></i></a>
                                                                </div>


                                                                <div class="modal fade" id="quickview2" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true" data-backdrop="false" style="background:rgba(0,0,0,.5);z-index: 999999999999;">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <div class="modal-body">
                                                                                <div class="quickview_body">
                                                                                    <div class="container">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-lg-5">
                                                                                                <div class="quickview_pro_img">
                                                                                                                                                                                                <img class="first_img" src="frontend/img/product-img/new-2.png" alt="Flower Textured Dress">
                                                                                                                                                                                            </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-7">
                                                                                                <div class="quickview_pro_des">
                                                                                                    <h4 class="title">Flower Textured Dress</h4>
                                                                                                    <div class="top_seller_product_rating mb-15">
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                    <h5 class="price">$120.99 <span>$130</span></h5>
                                                                                                    <p><p>Sint placeat aperiam ut explicabo. Consequatur soluta repellat fugit quidem. Fugiat necessitatibus aperiam corporis tempore iusto quasi. </p></p>
                                                                                                    <a href="product-detail/flower-textured-dress.html">View Full Product Details</a>
                                                                                                </div>
                                                                                                <!-- Add to Cart Form -->
                                                                                                <div class="cart" >
                                                                                                    <div class="quantity">
                                                                                                        <input  data-id="2" type="number" class="qty-text" id="qty" step="1" min="1" max="12"
                                                                                                                name="quantity" value="1">
                                                                                                    </div>
                                                                                                    <button type="submit" name="addtocart" data-product_id="2" data-quantity="1" data-price="34.00" id="add_to_cart_button_details_2" value="5" class="add_to_cart_button_details  cart-submit">Add to
                                                                                                        cart
                                                                                                    </button>
                                                                                                    <!-- Wishlist -->
                                                                                                    <div class="modal_pro_wishlist">
                                                                                                        <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="2" id="add_to_wishlist_2"><i class="icofont-heart"></i></a>
                                                                                                    </div>
                                                                                                    <!-- Compare -->
                                                                                                    <div class="modal_pro_compare">
                                                                                                        <a href="compare-2.html"><i class="icofont-exchange"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Share -->
                                                                                                <div class="share_wf mt-30">
                                                                                                    <p>Share with friends</p>
                                                                                                    <div class="_icon">
                                                                                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://codingwithprajwal.com/"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://twitter.com/intent/tweet?text=Default+share+text&amp;url=https://codingwithprajwal.com/"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite?mini=true&amp;url=https://codingwithprajwal.com/&amp;title=&amp;summary="><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://wa.me/?text=https://codingwithprajwal.com/"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                                                        <div class="col-12 col-sm-6 col-lg-4">
                                                    <div class="single_top_sellers">
                                                        <div class="top_seller_image">
                                                                                                                <img src="frontend/img/product-img/new-7.png" alt="Top-Sellers">
                                                        </div>
                                                        <div class="top_seller_desc">
                                                            <h5>Fashion Dress</h5>
                                                            <h6>$88.00 <span>$50.00</span></h6>
                                                            <div class="top_seller_product_rating">
                                                                                                                                                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                </div>

                                                            <!-- Info -->
                                                            <div
                                                                class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                                <!-- Add to cart -->
                                                                <div class="ts_product_add_to_cart">
                                                                    <a href="javascript:;" data-quantity="1" data-price="88.00" data-product-id="7" class="add_to_cart" id="add_to_cart7" data-toggle="tooltip" data-placement="top"
                                                                       title="Add To Cart"><i
                                                                            class="icofont-shopping-cart"></i></a>
                                                                </div>

                                                                <!-- Wishlist -->
                                                                <div class="ts_product_wishlist">
                                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="7" id="add_to_wishlist_7" data-toggle="tooltip"
                                                                       data-placement="top" title="Wishlist"><i
                                                                            class="icofont-heart"></i></a>
                                                                </div>

                                                                <!-- Compare -->
                                                                <div class="ts_product_compare">
                                                                    <a href="javascript:void(0);" class="add_to_compare" data-id="7" id="add_to_compare_7" data-toggle="tooltip"
                                                                       data-placement="top" title="Compare"><i
                                                                            class="icofont-exchange"></i></a>
                                                                </div>

                                                                <!-- Quick View -->
                                                                <div class="ts_product_quick_view">
                                                                    <a href="#" data-toggle="modal" data-target="#quickview7"><i
                                                                            class="icofont-eye-alt"></i></a>
                                                                </div>


                                                                <div class="modal fade" id="quickview7" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true" data-backdrop="false" style="background:rgba(0,0,0,.5);z-index: 999999999999;">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <div class="modal-body">
                                                                                <div class="quickview_body">
                                                                                    <div class="container">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-lg-5">
                                                                                                <div class="quickview_pro_img">
                                                                                                                                                                                                <img class="first_img" src="frontend/img/product-img/new-7.png" alt="Fashion Dress">
                                                                                                                                                                                            </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-7">
                                                                                                <div class="quickview_pro_des">
                                                                                                    <h4 class="title">Fashion Dress</h4>
                                                                                                    <div class="top_seller_product_rating mb-15">
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                    <h5 class="price">$120.99 <span>$130</span></h5>
                                                                                                    <p><p>Sint placeat aperiam ut explicabo. Consequatur soluta repellat fugit quidem. Fugiat necessitatibus aperiam corporis tempore iusto quasi. </p></p>
                                                                                                    <a href="product-detail/fashion-dress.html">View Full Product Details</a>
                                                                                                </div>
                                                                                                <!-- Add to Cart Form -->
                                                                                                <div class="cart" >
                                                                                                    <div class="quantity">
                                                                                                        <input  data-id="7" type="number" class="qty-text" id="qty" step="1" min="1" max="12"
                                                                                                                name="quantity" value="1">
                                                                                                    </div>
                                                                                                    <button type="submit" name="addtocart" data-product_id="7" data-quantity="1" data-price="88.00" id="add_to_cart_button_details_7" value="5" class="add_to_cart_button_details  cart-submit">Add to
                                                                                                        cart
                                                                                                    </button>
                                                                                                    <!-- Wishlist -->
                                                                                                    <div class="modal_pro_wishlist">
                                                                                                        <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="7" id="add_to_wishlist_7"><i class="icofont-heart"></i></a>
                                                                                                    </div>
                                                                                                    <!-- Compare -->
                                                                                                    <div class="modal_pro_compare">
                                                                                                        <a href="compare-2.html"><i class="icofont-exchange"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Share -->
                                                                                                <div class="share_wf mt-30">
                                                                                                    <p>Share with friends</p>
                                                                                                    <div class="_icon">
                                                                                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://codingwithprajwal.com/"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://twitter.com/intent/tweet?text=Default+share+text&amp;url=https://codingwithprajwal.com/"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite?mini=true&amp;url=https://codingwithprajwal.com/&amp;title=&amp;summary="><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://wa.me/?text=https://codingwithprajwal.com/"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                                                        <div class="col-12 col-sm-6 col-lg-4">
                                                    <div class="single_top_sellers">
                                                        <div class="top_seller_image">
                                                                                                                <img src="frontend/img/product-img/new-8.png" alt="Top-Sellers">
                                                        </div>
                                                        <div class="top_seller_desc">
                                                            <h5>Top&#039;s Short</h5>
                                                            <h6>$32.00 <span>$50.00</span></h6>
                                                            <div class="top_seller_product_rating">
                                                                                                                                                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                </div>

                                                            <!-- Info -->
                                                            <div
                                                                class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                                <!-- Add to cart -->
                                                                <div class="ts_product_add_to_cart">
                                                                    <a href="javascript:;" data-quantity="1" data-price="32.00" data-product-id="8" class="add_to_cart" id="add_to_cart8" data-toggle="tooltip" data-placement="top"
                                                                       title="Add To Cart"><i
                                                                            class="icofont-shopping-cart"></i></a>
                                                                </div>

                                                                <!-- Wishlist -->
                                                                <div class="ts_product_wishlist">
                                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="8" id="add_to_wishlist_8" data-toggle="tooltip"
                                                                       data-placement="top" title="Wishlist"><i
                                                                            class="icofont-heart"></i></a>
                                                                </div>

                                                                <!-- Compare -->
                                                                <div class="ts_product_compare">
                                                                    <a href="javascript:void(0);" class="add_to_compare" data-id="8" id="add_to_compare_8" data-toggle="tooltip"
                                                                       data-placement="top" title="Compare"><i
                                                                            class="icofont-exchange"></i></a>
                                                                </div>

                                                                <!-- Quick View -->
                                                                <div class="ts_product_quick_view">
                                                                    <a href="#" data-toggle="modal" data-target="#quickview8"><i
                                                                            class="icofont-eye-alt"></i></a>
                                                                </div>


                                                                <div class="modal fade" id="quickview8" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true" data-backdrop="false" style="background:rgba(0,0,0,.5);z-index: 999999999999;">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <div class="modal-body">
                                                                                <div class="quickview_body">
                                                                                    <div class="container">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-lg-5">
                                                                                                <div class="quickview_pro_img">
                                                                                                                                                                                                <img class="first_img" src="frontend/img/product-img/new-8.png" alt="Top&#039;s Short">
                                                                                                                                                                                            </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-7">
                                                                                                <div class="quickview_pro_des">
                                                                                                    <h4 class="title">Top&#039;s Short</h4>
                                                                                                    <div class="top_seller_product_rating mb-15">
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                    <h5 class="price">$120.99 <span>$130</span></h5>
                                                                                                    <p><p>Sint placeat aperiam ut explicabo. Consequatur soluta repellat fugit quidem. Fugiat necessitatibus aperiam corporis tempore iusto quasi. </p></p>
                                                                                                    <a href="product-detail/top-s-short.html">View Full Product Details</a>
                                                                                                </div>
                                                                                                <!-- Add to Cart Form -->
                                                                                                <div class="cart" >
                                                                                                    <div class="quantity">
                                                                                                        <input  data-id="8" type="number" class="qty-text" id="qty" step="1" min="1" max="12"
                                                                                                                name="quantity" value="1">
                                                                                                    </div>
                                                                                                    <button type="submit" name="addtocart" data-product_id="8" data-quantity="1" data-price="32.00" id="add_to_cart_button_details_8" value="5" class="add_to_cart_button_details  cart-submit">Add to
                                                                                                        cart
                                                                                                    </button>
                                                                                                    <!-- Wishlist -->
                                                                                                    <div class="modal_pro_wishlist">
                                                                                                        <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="8" id="add_to_wishlist_8"><i class="icofont-heart"></i></a>
                                                                                                    </div>
                                                                                                    <!-- Compare -->
                                                                                                    <div class="modal_pro_compare">
                                                                                                        <a href="compare-2.html"><i class="icofont-exchange"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Share -->
                                                                                                <div class="share_wf mt-30">
                                                                                                    <p>Share with friends</p>
                                                                                                    <div class="_icon">
                                                                                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://codingwithprajwal.com/"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://twitter.com/intent/tweet?text=Default+share+text&amp;url=https://codingwithprajwal.com/"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite?mini=true&amp;url=https://codingwithprajwal.com/&amp;title=&amp;summary="><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://wa.me/?text=https://codingwithprajwal.com/"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                                                        <div class="col-12 col-sm-6 col-lg-4">
                                                    <div class="single_top_sellers">
                                                        <div class="top_seller_image">
                                                                                                                <img src="frontend/img/product-img/new-4.png" alt="Top-Sellers">
                                                        </div>
                                                        <div class="top_seller_desc">
                                                            <h5>Silk Dress</h5>
                                                            <h6>$96.00 <span>$50.00</span></h6>
                                                            <div class="top_seller_product_rating">
                                                                                                                                                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                                                                                                                                </div>

                                                            <!-- Info -->
                                                            <div
                                                                class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                                <!-- Add to cart -->
                                                                <div class="ts_product_add_to_cart">
                                                                    <a href="javascript:;" data-quantity="1" data-price="96.00" data-product-id="3" class="add_to_cart" id="add_to_cart3" data-toggle="tooltip" data-placement="top"
                                                                       title="Add To Cart"><i
                                                                            class="icofont-shopping-cart"></i></a>
                                                                </div>

                                                                <!-- Wishlist -->
                                                                <div class="ts_product_wishlist">
                                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="3" id="add_to_wishlist_3" data-toggle="tooltip"
                                                                       data-placement="top" title="Wishlist"><i
                                                                            class="icofont-heart"></i></a>
                                                                </div>

                                                                <!-- Compare -->
                                                                <div class="ts_product_compare">
                                                                    <a href="javascript:void(0);" class="add_to_compare" data-id="3" id="add_to_compare_3" data-toggle="tooltip"
                                                                       data-placement="top" title="Compare"><i
                                                                            class="icofont-exchange"></i></a>
                                                                </div>

                                                                <!-- Quick View -->
                                                                <div class="ts_product_quick_view">
                                                                    <a href="#" data-toggle="modal" data-target="#quickview3"><i
                                                                            class="icofont-eye-alt"></i></a>
                                                                </div>


                                                                <div class="modal fade" id="quickview3" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true" data-backdrop="false" style="background:rgba(0,0,0,.5);z-index: 999999999999;">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <div class="modal-body">
                                                                                <div class="quickview_body">
                                                                                    <div class="container">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-lg-5">
                                                                                                <div class="quickview_pro_img">
                                                                                                    <img class="first_img" src="frontend/img/product-img/new-4.png" alt="Silk Dress">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-7">
                                                                                                <div class="quickview_pro_des">
                                                                                                    <h4 class="title">Silk Dress</h4>
                                                                                                    <div class="top_seller_product_rating mb-15">
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                    </div>
                                                                                                    <h5 class="price">$120.99 <span>$130</span></h5>
                                                                                                    <p><p>Sint placeat aperiam ut explicabo. Consequatur soluta repellat fugit quidem. Fugiat necessitatibus aperiam corporis tempore iusto quasi. </p></p>
                                                                                                    <a href="product-detail/silk-dress.html">View Full Product Details</a>
                                                                                                </div>
                                                                                                <!-- Add to Cart Form -->
                                                                                                <div class="cart" >
                                                                                                    <div class="quantity">
                                                                                                        <input  data-id="3" type="number" class="qty-text" id="qty" step="1" min="1" max="12"
                                                                                                                name="quantity" value="1">
                                                                                                    </div>
                                                                                                    <button type="submit" name="addtocart" data-product_id="3" data-quantity="1" data-price="96.00" id="add_to_cart_button_details_3" value="5" class="add_to_cart_button_details  cart-submit">Add to
                                                                                                        cart
                                                                                                    </button>
                                                                                                    <!-- Wishlist -->
                                                                                                    <div class="modal_pro_wishlist">
                                                                                                        <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="3" id="add_to_wishlist_3"><i class="icofont-heart"></i></a>
                                                                                                    </div>
                                                                                                    <!-- Compare -->
                                                                                                    <div class="modal_pro_compare">
                                                                                                        <a href="compare-2.html"><i class="icofont-exchange"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Share -->
                                                                                                <div class="share_wf mt-30">
                                                                                                    <p>Share with friends</p>
                                                                                                    <div class="_icon">
                                                                                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://codingwithprajwal.com/"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://twitter.com/intent/tweet?text=Default+share+text&amp;url=https://codingwithprajwal.com/"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite?mini=true&amp;url=https://codingwithprajwal.com/&amp;title=&amp;summary="><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                                                                                        <a target="_blank" href="https://wa.me/?text=https://codingwithprajwal.com/"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade show active" id="best-rated">
                                        <div class="best_rated_area">
                                            <div class="row">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Best Rated/Onsale/Top Sale Product Area -->
                <!-- Weekly Deals Area -->
            <!-- Weekly Deals Area -->

            <!-- Popular Brands Area -->
                <section class="popular_brands_area py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="popular_section_heading mb-50">
                                <h5>Popular Brands</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="popular_brands_slide owl-carousel">
                                                        <div class="single_brands">
                                    <img src="frontend/img/partner-img/1.jpg" alt="H&amp;M">
                                </div>
                                                        <div class="single_brands">
                                    <img src="frontend/img/partner-img/4.jpg" alt="Nike">
                                </div>
                                                        <div class="single_brands">
                                    <img src="frontend/img/partner-img/3.jpg" alt="Adidas">
                                </div>
                                                        <div class="single_brands">
                                    <img src="frontend/img/partner-img/2.jpg" alt="Zara">
                                </div>
                                                        <div class="single_brands">
                                    <img src="frontend/img/partner-img/6.jpg" alt="aetna">
                                </div>
                                                        <div class="single_brands">
                                    <img src="frontend/img/partner-img/5.jpg" alt="Rolex">
                                </div>
                                                    </div>
                        </div>
                    </div>
                </div>
            </section>
                <!-- Popular Brands Area -->

            <!-- Special Featured Area -->
            <section class="special_feature_area pt-5">
                <div class="container">
                    <div class="row">
                        <!-- Single Feature Area -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single_feature_area mb-5 d-flex align-items-center">
                                <div class="feature_icon">
                                    <i class="icofont-ship"></i>
                                    <span><i class="icofont-check-alt"></i></span>
                                </div>
                                <div class="feature_content">
                                    <h6>Free Shipping</h6>
                                    <p>For orders above $100</p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Feature Area -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single_feature_area mb-5 d-flex align-items-center">
                                <div class="feature_icon">
                                    <i class="icofont-box"></i>
                                    <span><i class="icofont-check-alt"></i></span>
                                </div>
                                <div class="feature_content">
                                    <h6>Happy Returns</h6>
                                    <p>7 Days free Returns</p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Feature Area -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single_feature_area mb-5 d-flex align-items-center">
                                <div class="feature_icon">
                                    <i class="icofont-money"></i>
                                    <span><i class="icofont-check-alt"></i></span>
                                </div>
                                <div class="feature_content">
                                    <h6>100% Money Back</h6>
                                    <p>If product is damaged</p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Feature Area -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single_feature_area mb-5 d-flex align-items-center">
                                <div class="feature_icon">
                                    <i class="icofont-live-support"></i>
                                    <span><i class="icofont-check-alt"></i></span>
                                </div>
                                <div class="feature_content">
                                    <h6>Dedicated Support</h6>
                                    <p>We provide support 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Special Featured Area -->

@endsection


