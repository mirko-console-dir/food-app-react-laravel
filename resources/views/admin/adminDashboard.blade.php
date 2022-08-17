<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Hi ADMIN You're logged in!
                </div>
                <main class="py-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="nav flex-column nav-pills">
        
                                    <a class="nav-link {{ Route::is('adminDashboard') ? 'active' : '' }}"
                                        href="{{ route('adminDashboard') }}">
                                        Dashboard
                                    </a>
        
                                  {{--   <a class="nav-link {{ Route::is('admin.products*') || Route::is('admin.variants*') ? 'active' : '' }}"
                                        href="{{ route('admin.products.index') }}">
                                        Prodotti
                                    </a> --}}
                                </div>
                            </div>
                            <div class="col border-left">
                                <div class="page">
                                       {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-lg btn-outline-success mb-1">Aggiungi
        prodotto</a> --}}

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
                    <td>{{ $product->category}}</td>
                    <td>{{ count($product->variants) }}</td>
                    <td>
                       {{--  <a href="{{ route('admin.products.show', ['product' => $product->id]) }}">
                            Vedi
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
