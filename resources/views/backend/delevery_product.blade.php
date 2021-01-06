@extends('backend.layouts.app')
@section('content')
@push('css')

@endpush
@php
$total=0;
@endphp
    <div class="main-panel">
      <!-- Navbar -->
      @include('backend.proted.navebar')
      @include('backend.proted.manu')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
<p id="dnt"></p>
              <div class="card">
                <div class="card-header card-header-primary">
                  {{-- <h4 class="card-title " style="
                 color: rgb(12, 11, 11);
                  text-align: center;
              ">Time Zone</h4> --}}
              <img src={{URL::to('assets/img/logo/logo.png')  }} alt="" style=" display: block;
              margin-left: auto;
              margin-right: auto;
              ">
                </div>
                <div class="card-body" >
                  <div class="table-responsive">
                      <div class="row">
                           @foreach ($data->slice(0, 1) as $item)
                      <div class="col-md-6 border-right">
                      <p><strong>User Name:-</strong>{{$item->User->name}}</p>
                      <p><strong>User Email:-</strong>{{$item->email}}</p>
                       <p><strong>User Phone:-</strong>{{$item->phone}}</p>

                      </div>

                      <div class="col-md-6 border-right">

                    <p><strong>User Address:-</strong>{{$item->city}}, {{$item->address}}</p>
                    <p><strong>Postcode:-</strong>{{$item->postcode}}</p>
                    <p><strong>Payment:-</strong>{{$item->payment}}</p>

                      </div>

                      @endforeach

                    </div>
                    <hr>
                    <h3>Order Item:-</h3>
                   <table class="table table-bordered table-striped table-hover table-white" >

                      <thead class=" text-primary">
                        <tr>
                            <th>Name</th>
                            <th>photo</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                            <th>Order Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $pro)
                        @php
                        $totalp =$pro->product->price * $pro->quantity;
                    @endphp

                        <tr>
                            <td>
                                {{ $pro->product->name }}
                            </td>
                            <td>
                                <img src="{{URL::to('image/'.$pro->product->image)  }}" style="height:100px; width:110 " alt="{!! 'image/'.$pro->product->photo !!}" >
                            </td>

                          <td>
                            {{ $pro->Product->price }}
                          </td>
                          <td>
                            {{ $pro->quantity }}
                         </td>
                          <td>
                            {{ $totalp }}
                          </td>
                          <td>
                            {{ $pro->created_at }}
                          </td>
                        </tr>
                        @php
                        $total +=$totalp;
                        @endphp



@endforeach
                     </tbody>
                     <tr>
                        <td colspan="4">Total</td>
                    <td>{{$total }}

                    </tr>
                    </table>



                </div>
                <div class="float-right">
                    @foreach ($data->slice(0,1) as $item)
                    <form action="{{ route('delevery_delete')}}" method="get">
                        <input type="text" value="{{$total }}" name="total" hidden >
                        <input type="text" value="{{ $item->user_id }}" name="id" hidden >
                 <button  class="btn btn-primary btn-lg" onclick="makepdf()">Delever</button></a>
                </form>
                    @endforeach
                </div>
                </div>

              </div>
            </div>

              </div>
            </div>
          </div>
        </div>
      </div>
@push('js')
<script>
    function makepdf(){


        document.getElementById("dnt").innerHTML = Date();
        window.print();
        window.close()

    }
</script>

@endpush
 @endsection
