<!DOCTYPE html>
<html>
<head>
    <title>Male Fashion</title>

<style>
    .futter{
        float: right;
    }
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    #logo{

        margin: 10px;
        padding: 15px;
       text-align: center;


    }
    #right{

    margin: top;
    text-align: right;


    }


    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
    </style>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <div id="logo">
        <h1 style="color: rgb(120, 45, 196)"> Male Fashion.</h1>
     </div>
     <hr>
   <div class="row">
       @foreach ($product->slice(0, 1) as $item)
       <div class="col-md-6 border-right">
   <p><strong>User Name:-</strong>{{$item->firstname}}</p>

   <p><strong>User Email:-</strong>{{$item->email}}</p>
   <p><strong>User Phone:-</strong>{{$item->phone}}</p>

       </div>

       <div class="col-md-6 ">

   <p><strong>User Address:-</strong>{{$item->city}}, {{$item->address}}</p>
   <p><strong>Postcode:-</strong>{{$item->postcode}}</p>
   <p><strong>Payment:-</strong>{{$item->payment}}</p>

   </div>
   </div>

   @endforeach


   <hr>
   <h3>Order Item:-</h3>
   <table id="customers">
     <tr>
       <th>Name</th>
       <th>Color</th>

       <th>Size</th>
       <th>Quantity</th>
       <th>Price</th>
     </tr>
     @php
         $total= 0;
     @endphp
     @foreach ($product as $pro)
   @php
       $total+= $pro->product->price
   @endphp

     <tr>
       <td>{{ $pro->Product->name }} </td>
       <td>{{ $pro->color }}</td>
       <td>{{ $pro->size }}</td>
       <td>{{ $pro->quantity }}</td>
       <td>{{ $pro->product->price}}</td>

     </tr>


     @endforeach
     <tr>
       <td colspan="4">Total</td>
   <td>{{ $total }} Tk</td>
   </tr>
   </table>
   <br>
<div class="futter" >
    <div class="section-title">
        <span>Information</span>
        <h2>Contact Us</h2>
        <p>As you might expect of a company that began as a high-end interiors contractor, we pay
            strict attention.</p>
    </div>
    <ul>
        <li>
            <h4>Feni</h4>
            <p>Munshirhut,Fulgazy <br />8801835488471<br  />
            imteajsajid1@gmail.com</p>
        </li>

    </ul>
</div>
</div>


    <p>Thank you</p>
</body>
</html>



