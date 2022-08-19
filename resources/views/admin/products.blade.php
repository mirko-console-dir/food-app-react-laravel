@extends('admin.admindashboard')
@section('content')
<a href="{{ route('products.create') }}" class="btn btn-lg btn-outline-success mb-1">Aggiungi prodotto</a>
    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Varianti</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Product::all() as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td> 
                    <td>{{ count($product->variants) }}</td>
                    <td>
                        <div class="btn-group btn-group-lg" role="group">
                          <a href="{{ route('products.show', ['product' => $product->id]) }}">
                            Vedi
                        </a>
                        <a href="{{ route('products.edit', ['product' => $product->id]) }}" type="button"
                            class="btn btn-secondary">
                            Modifica
                        </a> 
                        <a type="button" class="btn btn-danger"
                        onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                        Elimina
                    </a>
                        </div>
                        <form class="d-none" id="delete-form"
                        action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
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


