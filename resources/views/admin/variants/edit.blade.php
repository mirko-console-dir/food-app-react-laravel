@extends('admin.admindashboard')

@section('content')

    <h3 class="">
        Edit Variant
        {{ ucfirst($variant->name) }}
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
                <div class="form-group">
                    <label for="tax_id">Tax</label>
                    <select class="form-control" name="tax_id" id="tax_id" required>
                        @foreach (App\Models\Tax::all() as $tax)
                            <option value="{{ $tax->id }}" {{ $tax->id == $variant->tax_id ? 'selected' : '' }}>
                                {{ $tax->percentage }}%</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Confirm edit</button>
        </div>
    </form>
@endsection
