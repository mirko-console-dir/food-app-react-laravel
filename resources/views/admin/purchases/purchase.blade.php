@extends('admin.admindashboard')
@section('content')
    <h4>Order nr: {{ $purchase->id }}</h4>
    <h4>Cart total: $ {{ $purchase->amount }}</h4>
    {{-- cart order --}}
    <div class="cart_container">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                  <th scope="col">Image prod</th>
                  <th scope="col">Name</th>
                  <th scope="col">ID</th>
                  <th scope="col">Price each</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Total Meal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchase->cart_json->cartItems as $meal)
                    <td>
                        <img src="{{ $meal->image}}"alt="{{$meal->name_prod}}"width="100" height="100">
                    </td>
                    <td>
                        <span>{{ $meal->name_prod }}</span>
                    </td>
                    <td>
                        <span>{{ $meal->id_prod }}<span>
                    </td>
                    <td>
                        <span>$ {{ $meal->price }}<span>
                    </td>
                    <td>
                        <span>{{ $meal->amount }}<span>
                    </td>
                    <td>
                        <span>$ {{ $meal->total }}<span>
                    </td>
                </tbody>
            </table>
            <table class="table table-success table-striped">
            <thead>
                <tr>
                  <th scope="col">Image ingr</th>
                  <th scope="col">Name</th>
                  <th scope="col">ID</th>
                  <th scope="col">Price each</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Total Ing Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meal->ingredients as $ingredient)
                    <td>
                        <img src="{{ $ingredient->image}}" alt="{{$ingredient->name_variant}}" width="100"height="100">
                    </td>
                    <td>
                        <span>{{ $ingredient->name_variant }}</span>
                    </td>
                    <td>
                        <span>{{ $ingredient->id_variant }}</span>
                    </td>
                    <td>
                        <span>$ {{ $ingredient->price }}</span>
                    </td>
                    <td>
                        <span>{{  $ingredient->amount }}</span>
                    </td>
                    <td>
                        <span>$ {{  $ingredient->total }}</span>
                    </td>
                @endforeach
            </body>
        </table>
        @endforeach
    </div>
    {{-- cart order --}}
    {{-- destination order --}}
    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address delivery</th>
                <th scope="col">Address town delivery</th>
                <th scope="col">Address bill</th>
                <th scope="col">Address town bill</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $purchase->fullname }}</td>
                    <td>{{ $purchase->email }}</td> 
                    <td>{{ $purchase->phone }}</td> 
                    <td>{{ $purchase->addresses[0]->street }}</td> 
                    <td>{{ $purchase->addresses[0]->town }} {{ $purchase->addresses[0]->state }} {{ $purchase->addresses[0]->post_code }}</td> 
                    <td>{{ $purchase->addresses[1]->street }}</td> 
                    <td>{{ $purchase->addresses[1]->town }} {{ $purchase->addresses[1]->state }} {{ $purchase->addresses[1]->post_code }}</td> 
                </tr>
        </tbody>
    </table>
    {{-- destination order --}}
  
    <iframe width="450" height="250" frameborder="0" style="border:0" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?saddr=Glebe%20market&daddr={{$purchase->addresses[0]->street}}%20{{$purchase->addresses[0]->town}}%20{{$purchase->addresses[0]->state}}&output=embed" allowfullscreen></iframe>
    
@endsection