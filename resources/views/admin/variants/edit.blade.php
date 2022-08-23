@extends('admin.admindashboard')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a
                    href="{{ route('products.show', ['product' => $variant->product->id]) }}">{{ ucfirst($variant->product->name) }}</a>
            </li>
        </ol>
    </nav>

    <h3 class="">
        Modifica variante da per
        {{ ucfirst($variant->product->name) }}
    </h3>

    {{-- tutti gli errori di validazione in un alert --}}
    @if ($errors->any())
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form class="shadow-sm rounded p-4" action="{{ route('variants.update', ['variant' => $variant->id]) }}"
        method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image_primary">Image</label>
                    <div class="input-group">
                        <input type="file" class="form-control" name="image_primary" id="image_primary"
                            value="{{ $variant->image_primary }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <div class="input-group">
                        <input type="text" step="0.01" class="form-control" name="name" id="name"
                            value="{{ $variant->name }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <div class="input-group">
                        <input type="text" step="0.01" class="form-control" name="description" id="description"
                            value="{{ $variant->description }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="price" id="price"
                            value="{{ $variant->price }}" required>
                    </div>
                </div>
                <div class="form-group d-none">
                    <label for="product_id">ID prodotto collegato</label>
                    <input type="number" class="form-control" name="product_id" id="product_id"
                        value="{{ $variant->product_id }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Confirm edit</button>
        </div>
    </form>
@endsection
