<!-- Single Product -->
@foreach ($products as $item)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="single-product-area mb-30">
            <div class="product_image">
                @php
                $photo=explode(',',$item->photo);
                @endphp
                <!-- Product Image -->
                <a href="{{route('product.detail',$item->slug)}}">
                <img size="width=150px; height=150px;" class="normal_img" src="{{$photo[0]}}" alt="">
                </a>
                <!-- Product Badge -->
                <div class="product_badge">
                    <span>{{$item->type}}</span>
                </div>
                <!-- Wishlist -->
                <div class="product_wishlist">
                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$item->id}}" id="add_to_wishlist_{{$item->id}}"><i class="icofont-heart"></i></a>
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
                    <a href="javascript:void(0);" data-quantity="1" data-price="88.00" data-product-id="{{$item->id}}" class="add_to_cart" id="add_to_cart{{$item->id}}"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                </div>

                <!-- Quick View -->
                <div class="product_quick_view">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#quickview7"><i class="icofont-eye-alt"></i> Quick View</a>
                </div>

                <p class="brand_name">{{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</p>
                <a href="{{route('product.detail',$item->slug)}}">{{ucfirst($item->title)}}</a>
                <h6 class="product-price">${{number_format($item->offer_price,2)}}<small><del class="text-danger">${{number_format($item->price,2)}}</del></small></h6>
            </div>
        </div>
    </div>
@endforeach

