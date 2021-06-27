@extends('layouts.frontend_layout')
@section('frontendContent')


@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css') }}">

@endpush

@include('frontend.MainNav')

<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="{{ asset('img/media/products/'.$product->image_one) }}"><img
                            src="{{ asset('img/media/products/'.$product->image_one) }}" alt=""></li>
                    <li data-image="{{ asset('img/media/products/'.$product->image_two) }}"><img
                            src="{{ asset('img/media/products/'.$product->image_two) }}" alt=""></li>
                    <li data-image="{{ asset('img/media/products/'.$product->image_three) }}"><img
                            src="{{ asset('img/media/products/'.$product->image_three) }}" alt=""></li>
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="{{ asset('img/media/products/'.$product->image_one) }}" alt="">
                </div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">{{ $product->category->category_name }}</div>
                    <div class="product_name">{{ $product->product_name }}</div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="product_text">
                        <p>{!! $product->product_details !!}</p>
                    </div>
                    <div class="order_info">
                        <form action="{{ route('add.cart',$product->id) }}" method="post">
                            @csrf
                            <div class="clearfix" style="z-index: 1000;">

                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="">Color</label>
                                        <select class="form form-control " name="product_color" id="">
                                            <option value="" selected disabled>Select Color</option>
                                            @foreach ($product_colors as $product_color)
                                            <option value="{{ $product_color }}">{{ $product_color }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_color')
                                        <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="">Size</label>
                                        <select class="form form-control" name="product_size" id="">
                                            <option value="" selected disabled>Select Size</option>
                                            @foreach ($product_sizes as $product_size)

                                            <option value="{{ $product_size }}">{{ $product_size }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_size')
                                        <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if ($product->product_quantity < 1) @else <div class="form-group col-lg-4">
                                        <label for="">Quantity</label>
                                        <input class="form-control" type="number" name="quantity" id="">
                                        @error('quantity')
                                        <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                </div>
                                @endif
                            </div>
                    </div>

                    @if ($product->discount_price)
                    <div class="product_price discount">
                        ${{ $product->discount_price }}<span>${{ $product->selling_price }}</span>
                    </div>
                    @else
                    <div class="product_price discount">${{ $product->selling_price }}</div>

                    @endif

                    {{-- <div class="product_price">$2000</div> --}}
                    <div class="button_container">
                        <button type="submit" class="button cart_button">Add to Cart</button>
                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                    </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<!-- Recently Viewed -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Recently Viewed</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        <!-- Recently Viewed Item -->

                        @foreach ($related_products as $related_product)


                        <div class="owl-item">
                            <div
                                class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img
                                        src="{{ asset('img/media/products/'.$related_product->image_one) }}" alt="">
                                </div>
                                <div class="viewed_content text-center">
                                    @if ($related_product->discount_price)
                                    <div class="viewed_price">
                                        ${{ $related_product->discount_price }}<span>${{ $related_product->selling_price }}</span>
                                    </div>
                                    @else
                                    <div class="viewed_price">{{ $related_product->selling_price }}</div>
                                    @endif
                                    <div class="viewed_name"><a
                                            href="{{ route('single.product.index',['product_id'=>$related_product->id,'product_name'=>$related_product->product_name]) }}">{{ $related_product->product_name }}</a>
                                    </div>
                                </div>
                                <ul class="item_marks">
                                    @if ($related_product->discount_price)
                                    <li class="item_mark item_discount">
                                        -{{ round(($related_product->selling_price - $related_product->discount_price)/$related_product->selling_price * 100)  }}
                                        %
                                    </li>
                                    @endif
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
<script src="{{ asset('frontend/js/product_custom.js') }}"></script>
@endsection
@endsection
