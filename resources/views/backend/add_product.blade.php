@extends('backend.layouts.app')
@section('content')
@push('css')
@endpush


  <div class="wrapper ">

    <div class="main-panel">
        @include('backend.proted.navebar')
        @include('backend.proted.manu')

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
                  <h4 class="card-title">Product Profile</h4>
                  <p class="card-category">Complete your Product profile</p>
                </div>
                <div class="card-body">
                    <form name="form1" method="POST" action="{{ route('admin_add')}}" enctype="multipart/form-data" class="was-validated" >
                        @csrf


                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text"name="name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="Number" name="price" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                      <label for="inputPassword4">catagory</label>
                      <input class="form-control" value="" list="browsers" name="catagory"  required="" />
                      <datalist id="browsers">
                        <option value="Men">
                        <option value="Women">
                        <option value="Bags">
                        <option value="Clothing">
                        <option value="Shoes">
                        <option value="Accessories">
                          <option value="Kids">
                      </datalist>
                      </div>

                    </div>


                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Detailes</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">please enter product details</label>
                            <textarea class="form-control" name="details" rows="5"></textarea>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div>
                        <label class="bmd-label-floating">  Image</label>
                      <input type="file" name="photo" class="file-input"   required="">
                    </div>
                    <div>
                        <label class="bmd-label-floating">image2</label>
                      <input type="file" name="photo2" class="file-input"   required="">
                    </div>
                    <div>
                        <label class="bmd-label-floating">image3</label>
                      <input type="file" name="photo3" class="file-input"   required="">
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>

                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      @push('js')

      @endpush
       @endsection
