@extends('layouts.app')
@section('content')

<form action="{{ route('addcart') }}" method="POST">
    @csrf
    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="{{ asset('/') }}">Home</a>
                            <a href="{{ asset('shop') }}">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ URL::TO ( 'image/'.$product->image ) }}">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ URL::TO ( 'image/'.$product->image2 ) }}">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ URL::TO ( 'image/'.$product->image3 ) }}">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ URL::TO ( 'image/'.$product->image2 ) }}">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ URL::TO ( 'image/'.$product->image ) }}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src={{ URL::TO ( 'image/'.$product->image2 ) }} alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ URL::TO ( 'image/'.$product->image3 ) }}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ URL::TO ( 'image/'.$product->image3 ) }}" alt="">
                                    <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1" class="video-popup"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$product->name  }}</h4>

                            <h3>Price:-  {{ $product->price }}Tk</h3>
                            <p> {{ $product->detelse }}</p>
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    <label for="xxl">xxl
                                        <input type="radio"  value="XXl" name="size" id="xxl">
                                    </label>
                                    <label class="active"  for="xl">xl
                                        <input type="radio"  value="XL" name="size" id="xl">
                                    </label>
                                    <label for="l">l
                                        <input type="radio"  value="L" name="size" id="l">
                                    </label>
                                    <label for="sm">s
                                        <input type="radio"  value="S" name="size" id="sm">
                                    </label>
                                </div>
                                <div class="product__details__option__color">
                                    <span>Color:</span>
                                    <label class="c-1" for="sp-1">
                                        <input type="radio" value="black" name="color" id="sp-1">
                                    </label>
                                    <label class="c-2" for="sp-2">
                                        <input type="radio" value="blue" name="color" id="sp-2">
                                    </label>
                                    <label class="c-3" value="black" name="color" for="sp-3">
                                        <input type="radio" value="orange" name="color" id="sp-3">
                                    </label>
                                    <label class="c-4" value="black" name="color" for="sp-4">
                                        <input type="radio" value="rad" name="color" id="sp-4">
                                    </label>
                                    <label class="c-9" for="sp-9">
                                        <input type="radio" value="white" name="color" id="sp-9">
                                    </label>
                                </div>
                            </div>





                            <input type="text" name="product_id" value="{{ $product->id }}" hidden>




                            <div class="product__details__cart__option">
                                <div class="quantity">

                                    <div class="pro-qty">

                                      <input type="text" name="quantity" placeholder="quantity" value="1">
                                    </div>
                                </div>
                                <button type="submit"  class="primary-btn">add to cart</button>
                            </div>

                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="img/shop-details/details-payment.png" alt="">
                                <ul>
                                    <li><span>SKU:</span> 3812912</li>
                                    <li><span>Categories:</span> Clothes</li>
                                    <li><span>Tag:</span> Clothes, Skin, Body</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->
</form>

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($products-> slice(0, 4) as $pro)


                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ URL::TO ( 'image/'.$pro->image ) }}">
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Piqué Biker Jacket</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$67.24</h5>
                            <div class="product__color__select">
                                <label for="pc-1">
                                    <input type="radio" id="pc-1">
                                </label>
                                <label class="active black" for="pc-2">
                                    <input type="radio" id="pc-2">
                                </label>
                                <label class="grey" for="pc-3">
                                    <input type="radio" id="pc-3">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Section End -->
@include('proted.futter')
@endsection
