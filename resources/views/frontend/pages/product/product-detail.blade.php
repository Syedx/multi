@extends('frontend.layouts.master')

@section('content')


    <!-- Quick View Modal Area -->
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
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
                                        <img class="first_img" src="img/product-img/new-1-back.html" alt="">
                                        <img class="hover_img" src="img/product-img/new-1.html" alt="">
                                        <!-- Product Badge -->
                                        <div class="product_badge">
                                            <span class="badge-new">New</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="quickview_pro_des">
                                        <h4 class="title">Boutique Silk Dress</h4>
                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <h5 class="price">$120.99 <span>$130</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita
                                            quibusdam aspernatur, sapiente consectetur accusantium perspiciatis
                                            praesentium eligendi, in fugiat?</p>
                                        <a href="#">View Full Product Details</a>
                                    </div>
                                    <!-- Add to Cart Form -->
                                    <form class="cart" method="post">
                                        <div class="quantity">
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12"
                                                   name="quantity" value="1">
                                        </div>
                                        <button type="submit" name="addtocart" value="5" class="cart-submit">Add to
                                            cart
                                        </button>
                                        <!-- Wishlist -->
                                        <div class="modal_pro_wishlist">
                                            <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                        </div>
                                        <!-- Compare -->
                                        <div class="modal_pro_compare">
                                            <a href="compare.html"><i class="icofont-exchange"></i></a>
                                        </div>
                                    </form>
                                    <!-- Share -->
                                    <div class="share_wf mt-30">
                                        <p>Share with friends</p>
                                        <div class="_icon">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
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
    <!-- Quick View Modal Area -->

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Product Details</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Product Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Single Product Details Area -->
    <section class="single_product_details_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                            <!-- Carousel Inner -->
                            <div class="carousel-inner">
                                @php
                                    $photos=explode(',',$product->photo);
                                @endphp
                                @foreach ($photos as $key=>$photo)
                                    <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                                        <a class="gallery_img" href="{{$photo}}" title="{{$product->title}}">
                                            <img class="d-block w-100" src="{{$photo}}" alt="{{$product->title}}">
                                        </a>
                                        <!-- Product Badge -->
                                        <div class="product_badge">
                                            <span class="badge-new">New</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Carosel Indicators -->
                            <ol class="carousel-indicators">
                                @php
                                    $photos=explode(',',$product->photo);
                                @endphp
                                @foreach ($photos as $key=>$photo)
                                    <li class="{{$key==0 ? 'active' : ''}}" data-target="#product_details_slider" data-slide-to="{{$key}}" style="background-image: url({{$photo}});">
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Single Product Description -->
                <div class="col-12 col-lg-6">
                    <div class="single_product_desc">
                        <h4 class="title mb-2">{{ucfirst($product->title)}}</h4>
                        <div class="single_product_ratings mb-2">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span class="text-muted">(8 Reviews)</span>
                        </div>
                        <h4 class="price mb-4">${{number_format($product->offer_price)}} <span class="text-danger">${{number_format($product->price)}}<span></h4>

                        <!-- Overview -->
                        <div class="short_overview mb-4">
                            <h6>Overview</h6>
                            <p>{{$product->summary}}</p>
                        </div>

                        {{-- color option
                        <div class="widget p-0 color mb-3">
                            <h6 class="widget-title">Color</h6>
                            <div class="widget-desc d-flex">
                                <div class="custom-control custom-radio">
                                    <input type="radio">
                                </div>
                            </div>
                        </div> --}}


                    <!-- Size Option -->

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix my-5 d-flex flex-wrap align-items-center">
                            <div class="quantity">
                                <input data-id="7" type="number" class="qty-text form-control" id="qty2" step="1" min="1" max="12"
                                       name="quantity" value="1">
                            </div>
                            <button type="button" name="addtocart" data-product_id="7" data-quantity="1" data-price="88.00" id="add_to_cart_button_details_7" value="5"
                                    class="add_to_cart_button_details btn btn-primary mt-1 mt-md-0 ml-1 ml-md-3">Add to cart
                            </button>
                        </form>

                        <!-- Others Info -->
                        <div class="others_info_area mb-3 d-flex flex-wrap">
                            <a class="add_to_wishlist" href="wishlist.html"><i class="fa fa-heart"
                                                                               aria-hidden="true"></i> WISHLIST</a>
                            <a class="add_to_compare" href="compare.html"><i class="fa fa-th" aria-hidden="true"></i>
                                COMPARE</a>
                            <a class="share_with_friend" href="#"><i class="fa fa-share" aria-hidden="true"></i> SHARE
                                WITH FRIEND</a>
                        </div>

                        <!-- Size Guide -->
                        <div class="sizeguide">
                            <h6>Size Guide</h6>
                            <div class="size_guide_thumb d-flex">
                                                                                                    <a class="size_guide_img" href="#" style="background-image: url();">
                                    </a>
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_details_tab section_padding_100_0 clearfix">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab"
                                   role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span
                                        class="text-muted">(0)</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional
                                    Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#refund" class="nav-link" data-toggle="tab" role="tab">Return &amp;
                                    Cancellation</a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade  show active" id="description">
                                <div class="description_area">
                                    <h5>Description</h5>
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="reviews">

                                <div class="submit_a_review_area mt-50">
                                    <h4>Submit A Review</h4>
                                                                        <p class="py-5">You need to login for writing review. <a href="../user/auth.html">Click here!</a> to login</p>
                                                                    </div>
                                <div class="reviews_area">

                                                                        <ul class="mt-5">
                                        <li>

                                            <!-- Shop Pagination Area -->


                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                <div class="additional_info_area">
                                    <h5>Additional Info</h5>
                                    <p>In natus voluptatem eum veritatis dolores unde. Et consequatur blanditiis at iusto eos vel est. Et et quod nulla earum non sed. Id aspernatur facere quasi dignissimos sequi praesentium voluptatem. Sequi placeat porro voluptates nesciunt sed accusamus sit. Eum omnis sunt cum omnis sit porro. Vero molestiae fugit sed harum amet ipsa earum earum. Quia beatae aspernatur eaque itaque quae in aut. Sunt est aperiam eligendi sequi dolore voluptate quos. Sequi quia illum aut omnis illum. Alias suscipit dicta quo sapiente ipsam. Consequatur sunt quia et deserunt odio nesciunt quibusdam. </p>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="refund">
                                <div class="refund_area">
                                    <h6>Return Policy</h6>
                                    <p>Id et sit non ad culpa iure est. Consequuntur blanditiis ab voluptas nemo provident est. At quas et fugiat fugit accusantium sit aperiam. Dolorum et qui et illum cum sit corrupti. Sed doloribus inventore ut ea quia nihil. Sit beatae sint et beatae quasi. Sequi porro debitis rerum quibusdam quis dignissimos. Reprehenderit quibusdam natus non omnis. Repudiandae sed animi blanditiis rerum qui qui optio facere. Cupiditate aliquid earum eaque voluptatem quia nulla. Aut a dolores accusamus praesentium asperiores. Laborum laborum adipisci a.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single Product Details Area End -->

    <!-- Related Products Area -->
    <section class="you_may_like_area section_padding_0_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h5>You May Also Like</h5>
                    </div>
                </div>
            </div>

                @if (count($product->rel_prods)>0)

                    <div class="row">
                        <div class="col-12">
                            <div class="you_make_like_slider owl-carousel">

                                @foreach ($product->rel_prods as $item)
                                    @if ($item->id !=$product->id)

                                        <!-- Single Product -->
                                        <div class="single-product-area">
                                            <div class="product_image">
                                                <!-- Product Image -->
                                                @php
                                                    $photo=explode(',',$item->photo);
                                                @endphp
                                                <a href="{{route('product.detail',$item->slug)}}">
                                                    <img class="normal_img" src="{{$photo[0]}}" alt="{{$item->title}}">
                                                </a>

                                                <!-- Product Badge -->
                                                <div class="product_badge">
                                                    <span>{{$item->type}}</span>
                                                </div>

                                                <!-- Wishlist -->
                                                <div class="product_wishlist">
                                                    <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                                </div>

                                                <!-- Compare -->
                                                <div class="product_compare">
                                                    <a href="compare.html"><i class="icofont-exchange"></i></a>
                                                </div>
                                            </div>

                                            <!-- Product Description -->
                                            <div class="product_description">
                                                <!-- Add to cart -->
                                                <div class="product_add_to_cart">
                                                    <a href="#"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                                </div>

                                                <!-- Quick View -->
                                                <div class="product_quick_view">
                                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>
                                                </div>

                                                <p class="brand_name">{{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</p>
                                                <a href="{{route('product.detail',$item->slug)}}">{{ucfirst($item->title)}}</a>
                                                <h6 class="product-price">${{number_format($item->offer_price,2)}}<small><del class="text-danger">${{number_format($item->price,2)}}</del></small></h6>
                                            </div>
                                        </div>

                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                @endif
        </div>
    </section>
    <!-- Related Products Area -->

@endsection
