@extends('admin.admindashboard')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($product->name) }}</li>
        </ol>
    </nav>
    <div class="row">
      <div class="col-md">
            @if ($product->image_primary)
                <img class="w-50" src="{{ asset('/storage/images/products/' . $product->image_primary) }}" alt="Immagine principale">
            @else
                <p class="text-danger">Immagine principale non presente</p>
            @endif

            <p>Name: {{ $product->name }}</p>
            <p>Description: {{ $product->description }}</p>
            <p>Category: {{ $product->category->name }}</p>
            <p>Tax: {{ $product->price }}%</p>
            <p>Tax: {{ $product->tax->percentage }}%</p>
            <p>Product Code:
                @if ($product->product_code)
                    {{ $product->product_code }}
                @else
                    <span class="text-danger">Doesn't exist</span>
                @endif
            </p>

            @if ($product->video_mp4)
               {{--  <p>Product video: 
                    <a
                        href="{{ route('admin.download', ['product' => $product->id]) }}">{{ $product->video_mp4 }}</a>
                </p> --}}
            @else
                <p class="text-danger">Video not exist</p>
            @endif


            <div class="btn-group btn-group-lg" role="group">
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
        </div>
       
    </div>



@endsection
