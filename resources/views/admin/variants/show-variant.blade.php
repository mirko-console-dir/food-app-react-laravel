@extends('admin.admindashboard')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($variant->name) }}</li>
        </ol>
    </nav>
    <div class="row">
      <div class="col-md">
            @if ($variant->image_primary)
                <img class="w-50" src="{{ asset('/storage/images/products/variants/' . $variant->image_primary) }}" alt="first image">
            @else
                <p class="text-danger">Immagine principale non presente</p>
            @endif

            <p>Name: {{ $variant->name }}</p>
            <p>Description: {{ $variant->description }}</p>
            <p>Tax: {{ $variant->tax->percentage }}%</p>

            <div class="btn-group btn-group-lg" role="group">
            <a href="{{ route('variants.edit', ['variant' => $variant->id]) }}" type="button"
                    class="btn btn-secondary">
                    Modifica
                </a>                 
                <a type="button" class="btn btn-danger"
                    onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                    Elimina
                </a>
            </div>
            <form class="d-none" id="delete-form"
                action="{{ route('variants.destroy', ['variant' => $variant->id]) }}" method="POST">
                @method('DELETE')
                @csrf
            </form>
        </div>
    </div>
@endsection
