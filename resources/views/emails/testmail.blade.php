@component('mail::message')
# LARRYBRIN
{{$details['body']}}
{{--Dear {{$details['auth']->name}} Your  Product Delivery Soon .....--}}

@php
$total=0;
@endphp
@component('mail::table')
| Name       |     Quantity            | Price  |
| ------------- |:-------------:       | --------:|
@foreach ($details['order'] as $order)
| {{$order->product->name}}  | {{$order->quantity}} |$ {{$order->product->price}} |
@php
$subtotal=$order->quantity * $order->product->price;
@endphp
@php
$total_price=$total+=$subtotal;
@endphp
@endforeach
| ------------- |:-------------:       | --------:|
|               |                     | $ {{$total}}  |
@endcomponent

Thanks <br>
{{ config('app.name') }}
@endcomponent
