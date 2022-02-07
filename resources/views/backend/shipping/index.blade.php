@extends('backend.layouts.app')
@section('content')
<div class="main-panel">
    <!-- Navbar -->
    @include('backend.proted.navebar')
    @include('backend.proted.manu')
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Simple Table</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="addbutton">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">+ADD Shipping</button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Shipping_price</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('Shipping.store')}}" method="POST">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="number" name="shipping_price"  required class="form-control" placeholder="shipping_price">
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            {{--end--}}
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Shipping Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($shippings as $shipping)
                                            <td>{{$loop->iteration}}</td>
                                            <td>${{ $shipping->shipping_price}}</td>
                                            <form action="{{route('Shipping.destroy',$shipping->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to unenroll?');" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <td>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </td>
                                            </form>
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
</div>
@include('backend.proted.footer')

@endsection
