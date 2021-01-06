@extends('backend.layouts.app')
@section('content')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endpush
    <div class="main-panel">
      <!-- Navbar -->
      @include('backend.proted.navebar')
      @include('backend.proted.manu')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Simple Table</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-striped table-hover table-white" style="width:100%">
                      <thead class=" text-primary">
                        <tr>
                            <th>Name</th>
                            <th>Gmail</th>
                            <th>Phone</th>
                            <th>Address</th>

                            <th>Prodact </th>
                            <th>Quantity</th>
                            <th>Payment</th>

                            <th>Order_Date</th>


                            <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                        @foreach ($order as $pro)

                        <td>{{ $pro->User->name }}</td>
                        <td>{{ $pro->email  }}</td>
                        <td>{{ $pro->phone }}</td>

                        <td style="width: 150px;">{{ $pro->city}}<b></b>->{{ $pro->address }} <br>Postcode:-{{ $pro->postcode}}</td>

                        <td><img src="{{URL::to('image/'.$pro->Product->image)  }}" height="100px;" width="85px;" alt="{!! 'image/' !!}" ><br><h5>{{  $pro->Product->name }}</h5></td>
                        <td><h3>{{ $pro->quantity}}</h3></td>
                        <td>{{ $pro->payment}}</td>

                        <td>{{ $pro->created_at}}</td>

                        <td><a href="{{ URL::TO ('admin/detelase/'.$pro->user_id) }}"class="btn btn-success" >Show</a></td>
                        </tr>
                        @endforeach
                      </tbody>

                    </table>


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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endpush
 @endsection
