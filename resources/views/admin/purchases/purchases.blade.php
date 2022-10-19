@extends('admin.admindashboard')
@section('content')

    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Amount</th>
                <th scope="col">Address delivery</th>
                <th scope="col">Address town delivery</th>
                <th scope="col">Address bill</th>
                <th scope="col">Address town bill</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>

            @foreach (App\Models\Purchase::all() as $purchase)
                <tr>
                    <th scope="row">{{ $purchase->id }}</th>
                    {{-- DELIVERY DATA --}}
                    <td>{{ $purchase->fullname }}</td>
                    <td>{{ $purchase->email }}</td> 
                    <td>{{ $purchase->phone }}</td> 
                    <td>{{ $purchase->amount }}</td> 
                    <td>{{ $purchase->addresses[0]->street}}</td> 
                    <td>{{ $purchase->addresses[0]->delivery_town }} {{ $purchase->addresses[0]->state }} {{ $purchase->addresses[0]->post_code }}</td> 
                    {{-- /DELIVERY DATA --}}

                    {{-- BILL DATA --}}
                    <td>{{ $purchase->addresses[1]->street }}</td> 
                    <td>{{ $purchase->addresses[1]->town }} {{ $purchase->addresses[1]->state }} {{ $purchase->addresses[1]->post_code }}</td> 
                    {{-- /BILL DATA --}}
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
            @endforeach
        </tbody>
    </table>
@endsection


