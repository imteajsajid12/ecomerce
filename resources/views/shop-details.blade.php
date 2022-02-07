@extends('layouts.app')
@section('content')
 {{--messege--}}
 @if ($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
 @endif
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
                                    <a href="{{$product->video}}" class="video-popup"><i class="fa fa-play"></i></a>
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
                            <h4>{{$product->name }}</h4>
                            <h3>Price:- ${{ $product->price }}</h3>
                            <p> {{ $product->detailes }}</p>
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    @foreach ($product->size as $sizes)
                                    <label for="{{$sizes}}">{{$sizes}}
                                        <input type="radio" value="{{$sizes}}" name="size" id="{{$sizes}}" >
                                    </label>
                                    @endforeach

                                    {{--<label class="active" for="xl">xl
                                        <input type="radio" value="XL" name="size" id="xl">
                                    </label>
                                    <label for="l">l
                                        <input type="radio" value="L" name="size" id="l">
                                    </label>
                                    <label for="sm">s
                                        <input type="radio" value="S" name="size" id="sm">
                                    </label>--}}
                                </div>
                                <div class="product__details__option__color">
                                    <span>Color:</span>
                                    {{--@foreach ($product->color as $color)
                                    @if( $color == !null )
                                    <label>{{$color}}</label>
                                    <input type="radio" value="{{$color}}" checked="checked" name="color" id="sp-1">
                                    @endif
                                    @endforeach--}}
                                    @foreach ($product->color as $color)
                                    @if( $color == !null )
                                    <label class="{{$color}}" for="{{$color}}" style="background: {{$color}}">
                                        <input type="radio"  value={{$color}} name="color" id="{{$color}}">
                                    </label>
                                    @endif
                                    @endforeach
                                    {{--<label class="c-2" for="sp-2">
                                        <input type="radio" value="blue" name="color" id="sp-2">
                                    </label>
                                    <label class="c-3" value="black" name="color" for="sp-3">
                                        <input type="radio" value="orange" name="color" id="sp-3">
                                    </label>
                                    <label class="c-4" value="green" name="color" for="sp-4">
                                        <input type="radio" value="rad" name="color" id="sp-4">
                                    </label>
                                    <label class="c-9" for="sp-9">
                                        <input type="radio" value="white" name="color" id="sp-9">
                                    </label>
                                    <label class="c-10" value="black"for="sp">
                                        <input type="radio" value="green" name="color" id="sp-">
                                    </label>--}}

                                    {{--<input class="form-control" value=""name="color" required="" />
                                            <datalist id="browsers">
                                                @foreach ($product->color as $color)
                                                <option value="{{$color}}">{{$color}}</option>
                                    @endforeach
                                    </datalist>--}}

                                    {{--<label class="c-10" value="black"for="sp">
                                    <select name="zone_id" id="zoneId" required value="{{old('zone_id')}}" class="form-control">
                                        <option value="">Select Zone</option>
                                        <option value="">kkkk</option>
                                        <option value="">kkk</option>
                                        {{--@foreach ($zones as $zone)
                                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                        @endforeach--}}
                                    {{--</select>--}}






                                </div>
                            </div>
                            <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                            <input type="text" name="product_quantity" value="{{ $product->quantity }}" hidden>
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" placeholder="quantity" value="1">
                                    </div>
                                </div>
                                <button type="submit" class="primary-btn">add to cart</button>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="img/shop-details/details-payment.png" alt="">
                                {{--<ul>
                                    <li><span>SKU:</span> 3812912</li>
                                    <li><span>Categories:</span> Clothes</li>
                                    <li><span>Tag:</span> Clothes, Skin, Body</li>
                                </ul>--}}
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
            @if ($pro->quantity==!0)
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
                        <h6>{{$pro->name}}</h6>
                        <a href="{{asset('/details/'.$pro->id)}}" class="add-cart">+ Add To Cart</a>
                        {{--<div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>--}}
                        <h5>${{$pro->price}}</h5>
                        <div class="product__color__select">
                            @foreach ($pro->color as $color )
                            @if( $color == !null )
                            <label for="pc-4" style="background: {{$color}}">
                                <input type="radio" id="pc-4">
                            </label>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- Related Section End -->
@include('proted.futter')
@endsection
