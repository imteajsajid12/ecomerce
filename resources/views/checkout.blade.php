@extends('layouts.app')
@section( 'content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <form action="{{ route('ordernow') }}" method="post">
        @csrf

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                            here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>

                            <div class="checkout__input">
                                <p>Name<span>*</span></p>
                                <input type="text" name="name"  placeholder="Name" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" placeholder="Street Address" class="checkout__input__add" required>
                                <input type="text" name="homeaddress" placeholder="Apartment, suite, unite ect (optinal)" required>
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city" required>
                            </div>

                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postcode" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" required>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                @php
                                $total=0;
                                @endphp
                                 @foreach ($product as $key=> $pro)
                                 @php
                                 $totalp =$pro->product->price * $pro->quantity;
                                 $total+=$totalp
                                 @endphp

                                <ul class="checkout__total__products">
                                    <li>
                                   {{ ++$key }}.    {{ $pro->product->name }} <span>{{  $pro->product->price }} Tk</span></li>


                                </ul>
                                @endforeach
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>{{ $total }} Tk</span></li>
                                    <li>Total <span>{{ $total }} Tk</span></li>
                                </ul>

                                <p>Thank you dear coustomer.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                       Hand payment
                                        <input type="checkbox" id="payment" name="payment" value="hand_cash">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                    Bikash
                                        <input type="checkbox" id="paypal" name="payment" value="bikash">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    </form>
    <!-- Checkout Section End -->
    @include('proted.futter')
@endsection
