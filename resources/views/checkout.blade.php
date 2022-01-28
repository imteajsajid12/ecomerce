@extends('layouts.app')
@section( 'content')
{{--validation--}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{--end validation--}}
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
                <form>

                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                                    here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>

                            <div class="checkout__input">
                                <p>Name<span>*</span></p>
                                <input type="text" name="name" id="name" placeholder="Name" required>
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
                                        <input type="number" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" required>
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
                                $total_price = $total+=$totalp;
                                @endphp
                                <ul class="checkout__total__products">
                                    <li>
                                        {{ ++$key }}. {{ $pro->product->name }}
                                        <span>{{ $pro->product->price }} Tk</span>
                                    </li>
                                </ul>
                                @endforeach
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>{{ $total }}$</span></li>
                                    {{--<li>Total <span>{{ $total_price }}$</span></li>--}}
                                </ul>
                                <p>Thank you dear coustomer.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Hand payment
                                        <input type="checkbox" id="payment" name="payment" value="hand_cash">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button>jj</button>
                                <button type="submit" class="site-btn ">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
</form>


<!-- Checkout Section End -->
@include('proted.futter')
<script>
    function kk() {
        // $(document).ready(function() {
        //    $(document).on('click', '.savebtn', function() {
        //alert("hi");
        //var name = document.getElementByid('name').value;
        //var address = document.getElementById('address').value;
        //var homeaddress = document.getElementById('homeaddress').value;
        //var city = document.getElementById('city').value;
        //var postcode = document.getElementById('postcode').value;
        //var phone = document.getElementById('phone').value;
        //var email = document.getElementById('email').value;
        axios.post('/payment', {
                name: "hi",
                //address: address,
                //homeaddress: homeaddress,
                //city: city,
                //postcode: postcode,
                //phone: phone,
                //email: email,
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });
        //console.log(element);
        //    })
        //});
    }

</script>
@endsection
