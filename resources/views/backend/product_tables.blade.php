@extends('backend.layouts.app')
@section('content')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endpush
    <div class="main-panel">
        @include('backend.proted.manu')
      <!-- Navbar -->
      @include('backend.proted.navebar')


      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Simple Table</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <tr>


                            <th>Photo</th>
                            <th>Name</th>
                            <th>Prodect price</th>
                            <th>Prodact detalse</th>

                            <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                        @foreach ($product as $pro)
                        <td> <img src="{{ URL::TO ('image/'.$pro->image) }}" height="100px;" width="60px;" alt="{!! 'image/'.$pro->photo !!}" ></td>
                        <td>{{ $pro->name }}</td>
                        <td>{{ $pro->price }} tk</td>
                        <td>{{ $pro->detelse }}</td>


                        <td><a href="{{ URL::TO ('admin/edite'.$pro->id) }}"class="btn btn-primary">Edite</a>
                        <a href="{{ URL::TO ('admin/delete'.$pro->id) }}"class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</a></td>
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
