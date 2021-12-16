@component('mail::message')
# LARRYBRIN

Dear {{$details['auth']->name}} Your  Product Delivery Soon .....

@php
$total=0;
@endphp
@component('mail::table')
| Name       |     Quantity            | Price  |
| ------------- |:-------------:       | --------:|
@foreach ($details['order'] as $order)
| {{$order->product->name}}  | {{$order->quantity}} |$ {{$order->product->price}} |
@php
$subtotal=$total+=$order->product->price;
@endphp
@endforeach
| ------------- |:-------------:       | --------:|
|               |                     | $ {{$subtotal}}  |
@endcomponent

Thanks <br>
{{ config('app.name') }}
@endcomponent
