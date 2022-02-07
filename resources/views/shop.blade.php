@extends('layouts.app')

@section('content')
<!--MESSEGE-->


@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{ asset('/scearch') }}" method="get">
                                <input type="text" placeholder="Search..." name="qurey">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach($categories as $categorie)
                                                    <li><a href="{{ asset('/shop/'.$categorie->name) }}">{{$categorie->name}}</a></li>

                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($product as $pro)
                        @if ($pro->quantity==!0)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ URL::TO ( 'image/'.$pro->image ) }}">
                                    <ul class="product__hover">
                                        {{--<li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>--}}
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $pro->name }}</h6>
                                    <a href="{{ URL::TO ('details/'.$pro->id ) }}" class="add-cart">+ Add To Cart</a>
                                    {{--<div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>--}}
                                    <h5>$ {{ $pro ->price }}</h5>
                                    <div class="product__color__select">
                                        @foreach ($pro->color as $color )
                                        @if( $color == !null )
                                        <label for="pc-4" style="background: {{$color}}">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        @endif
                                        @endforeach
                                        {{--<label class="active black"  for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{$product->links()}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">

                                {{--<span> </span>
                                <a class="active" href="#">{</a>--}}
                                {{--<a href="#">2</a>
                                <a href="#">3</a>

                                <a href="#">21</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    @include('proted.futter')
   @endsection
