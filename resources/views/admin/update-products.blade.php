@extends('admin.admindashboard')

@section('content')
    <h3 class="">Modifica {{ $product->name }}</h3>
    {{-- tutti gli errori di validazione in un alert --}}
    @if ($errors->any())
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form class="shadow-sm rounded p-4" action="{{ route('products.update', ['product' => $product->id]) }}"
        method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Nome *</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Descrizione *</label>
                    <textarea name="description" id="description" class="form-control"
                        required>{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select class="form-control" name="category_id" id="category_id" required>
                        @foreach (App\Models\Category::all() as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                {{ ucfirst($cat->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="price" id="price"
                            value="{{ $product->price }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tax_id">Tax</label>
                    <select class="form-control" name="tax_id" id="tax_id" required>
                        @foreach (App\Models\Tax::all() as $tax)
                            <option value="{{ $tax->id }}" {{ $tax->id == $product->tax_id ? 'selected' : '' }}>
                                {{ $tax->percentage }}%</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="product_code">Codice prodotto</label>
                    <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}"
                        id="product_code">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="font-weight-bold" for="image_primary">Immagine principale</label>
                    @if ($product->image_primary)
                        <small class="text-success">presente</small>
                    @else
                        <small class="text-danger">non presente</small>
                    @endif
                    <input type="file" name="image_primary" id="image_primary" class="form-control-file">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="image_secondary">Immagine secondaria</label>
                    @if ($product->image_secondary)
                        <small class="text-success">presente</small>
                    @else
                        <small class="text-danger">non presente</small>
                    @endif
                    <input type="file" name="image_secondary" id="image_secondary" class="form-control-file">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="image_ter">Immagine ulteriore</label>
                    @if ($product->image_ter)
                        <small class="text-success">presente</small>
                    @else
                        <small class="text-danger">non presente</small>
                    @endif
                    <input type="file" name="image_ter" id="image_ter" class="form-control-file">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="video_mp4">Video product</label>
                    @if ($product->video_mp4)
                        <small class="text-success">presente</small>
                    @else
                        <small class="text-danger">non presente</small>
                    @endif
                    <input type="file" name="video_mp4" id="video_mp4" class="form-control-file">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Aggiorna</button>
        </div>
    </form>
@endsection
