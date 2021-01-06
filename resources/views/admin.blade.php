
@extends('layouts.app')


@section('content')
@push('css')

@endpush

<!--MESSEGE-->


@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<!--END MESSEGE-->

      <div class="modal-body">
        <form name="form1" method="POST" action="{{ route('admin_add')}}" enctype="multipart/form-data" class="was-validated" >
            @csrf

        <div class="form-row">



            <div class="form-group col-md-3">
              <label for="inputEmail4">Item_name</label>
              <input type="text" name="name" class="form-control" id="Email4" placeholder=" name" required="">

            </div>
            <div class="form-group col-md-3">
              <label for="inputPassword4">Price</label>
              <input type="number" class="form-control" name="price" id="price"  placeholder="Price" required="">

            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">catagory</label>
                <input class="form-control"  list="browsers" name="catagory"  required="" />
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

              <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">Example detelse</label>
                <textarea class="form-control" name="detelse" id="exampleFormControlTextarea1" rows="0" required=""></textarea>
              </div>

              <div class="form-group col-md-3">
                <label for="inputEmail4">main_photo</label>
                <input type="file" name="photo" class="file-input" id="" required="" >
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">photo2</label>
                <input type="file" name="photo2" class="file-input" id="" >
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">photo3</label>
                <input type="file" name="photo3" class="file-input" id="" >
            </div>







        </div>
        <div class="modal-footer">

<a href="/mail">lko</a>
            <button type="submit" class="btn btn-primary"onclick="myFunction()" value="Reset form">Save changes</button>
            </div>

    </form>
      </div>


    <br>


      </div>



@push('js')
<script>


    </script>

@endpush

@endsection

