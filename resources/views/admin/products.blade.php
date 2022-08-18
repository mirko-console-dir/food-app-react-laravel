@extends('admin.admindashboard')
@section('content')
{{--  <a href="{{ route('admin.products.create') }}" class="btn btn-lg btn-outline-success mb-1">Aggiungi prodotto</a> --}}
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
                    <td>{{ $product->category }}</td>
                    {{-- <td>{{ $product->category->name }}</td> --}}
                    <td>{{ count($product->variants) }}</td>
                    <td>
                      {{--   <a href="{{ route('admin.products.show', ['product' => $product->id]) }}">
                            Vedi
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


