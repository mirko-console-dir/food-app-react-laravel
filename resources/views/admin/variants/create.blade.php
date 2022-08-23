@extends('admin.admindashboard')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a
                    href="{{ route('products.show', ['product' => $_GET['product_id']]) }}">{{ ucfirst($_GET['product_name']) }}</a>
            </li>
        </ol>
    </nav>
    <h3 class="">Nuova variante per {{ strtoupper($_GET['product_name']) }} (id prodotto: {{ $_GET['product_id'] }})
    </h3>
    {{-- test --}}
    {{-- {{ dd($_GET['product_id'], $_GET['product_name']) }} --}}

    {{-- tutti gli errori di validazione in un alert --}}
    @if ($errors->any())
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form class="shadow-sm rounded p-4" action="{{ route('variants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image_primary">Image</label>
                    <div class="input-group">
                        <input type="file" name="image_primary" id="image_primary" class="form-control-file">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Nome *</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Descrizione *</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Prezzo</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="price" id="price" step="0.01" required>
                        <div class="input-group-append">
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                </div>
                <div class="form-group d-none" style="display:none">
                    <label for="product_id">ID prodotto collegato</label>
                    <input type="number" class="form-control" name="product_id" id="product_id"
                        value="{{ $_GET['product_id'] }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Inserisci variante</button>
        </div>
    </form>
@endsection
