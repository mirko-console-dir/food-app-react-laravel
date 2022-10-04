@extends('admin.admindashboard')
@section('content')
    <h2>Purchase id:{{ $purchase->id }}</h2>
    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Cart</th>
                <th scope="col">Amount</th>
                <th scope="col">Address delivery</th>
                <th scope="col">Address town delivery</th>
                <th scope="col">Address bill</th>
                <th scope="col">Address town bill</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $purchase->fullname }}</td>
                    <td>{{ $purchase->email }}</td> 
                    <td>{{ $purchase->phone }}</td> 
                    <td>{{ $purchase->cart_json }}</td> 
                    <td>{{ $purchase->amount }}</td> 
                    <td>{{ $purchase->delivery_address }}</td> 
                    <td>{{ $purchase->delivery_town }} {{ $purchase->delivery_state }} {{ $purchase->delivery_post_code }}</td> 
                    <td>{{ $purchase->bill_address }}</td> 
                    <td>{{ $purchase->bill_town }} {{ $purchase->bill_state }} {{ $purchase->bill_post_code }}</td> 
                    <td>
                        <div class="btn-group btn-group-lg" role="group">
                          <a href="{{ route('purchases.show', ['purchase' => $purchase->id]) }}" class="btn btn-info">
                            Vedi 
                        </a>
                            <a type="button" class="btn btn-danger"
                            onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                            Elimina
                            </a>
                        </div>
                        <form class="d-none" id="delete-form"
                        action="{{ route('purchases.destroy', ['purchase' => $purchase->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                    </td>
                    <td>
                    </td>
                </tr>
        </tbody>
    </table>
@endsection


