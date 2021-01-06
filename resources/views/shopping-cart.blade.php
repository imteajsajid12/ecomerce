@extends('layouts.app')
@section( 'content')


@php
$total=0;
@endphp


    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                    <th>update</th>
                                    <th>Quantity</th>
                                    <th>Total</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $pro)
                                @php
                                $totalp =$pro->product->price * $pro->quantity;
                                $total+=$totalp
                                @endphp

                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ URL::TO ( 'image/'.$pro->product->image) }}" alt="" style="height: 120px; width: 70px">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $pro->product->name }}</h6>
                                            <h5>{{ $pro->product->price }} Tk</h5>
                                        </div>
                                    </td>
                                    <form action="{{ route('update') }}" method="Post">
                                        @csrf
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">



                                                <input type="text" name="qty" value="{{$pro->quantity}}">

                                            </div>
                                        </div>
                                    </td>

                                    <td class="quantity__item">
                                        <div class="quantity">

                                            <input type="text" name="name"  value="{{$pro->product_id}}" hidden>
                                            <button type="submit" class="btn btn-primary btn-sm">update</button>


                                            </div>
                                        </div>
                                    </td>
                                </form>
                                    <td class="cart__price">{{ $totalp }} Tk</td>
                                    <td class="cart__close"><a href="{{URL::to('cart/delete/'.$pro->id)  }}" onclick= "return confirm('Are You Sure?')"><i class="fa fa-close"></i></a></td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ asset('/shop') }}">Continue Shopping</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>{{ $total }} Tk</span></li>
                            <li>Total <span>{{ $total }} Tk</span></li>
                        </ul>
                        <a href="{{ asset('/chakout') }}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@include('proted.futter')
    <!-- Shopping Cart Section End -->
@endsection
