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
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <tr>


                            <th>Name</th>
                            <th>Email</th>
                          
                            <th>Messege</th>

                            <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                        @foreach ($con as $pro)

                        <td>{{ $pro->name }}</td>

                        <td>{{ $pro->email }}</td>

                        <td>{{ $pro->messege }}</td>

                        <td><a href="{{ URL::TO ('admin/contacts'.$pro->id) }}"class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</a></td>
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
