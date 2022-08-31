@extends('admin.admindashboard')

@section('content')
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
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="price" id="price" step="0.01" required>
                        <div class="input-group-append">
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tax_id">Tax</label>
                    <select class="form-control" name="tax_id" id="tax_id" required>
                        @foreach (App\Models\Tax::all() as $tax)
                            <option value="{{ $tax->id }}">{{ ucfirst($tax->percentage) }} %</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Insert variant</button>
        </div>
    </form>
@endsection
