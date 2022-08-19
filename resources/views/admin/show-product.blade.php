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
                <img src="{{ asset('/storage/images/products/' . $product->image_primary) }}" alt="Immagine principale">
            @else
                <p class="text-danger">Immagine principale non presente</p>
            @endif

            <p>Name: {{ $product->name }}</p>
            <p>Description: {{ $product->description }}</p>
            <p>Category: {{ $product->category->name }}</p>
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
       {{--  <div class="col-md border-left">
            <div>
                <a class="btn btn-outline-primary"
                    href="{{ route('admin.variants.create', ['product_id' => $product->id, 'product_name' => $product->name, 'unit' => $product->category->unit]) }}">
                    Aggiungi una variante per questo prodotto
                </a>
            </div>

            @if (!count($product->variants))
                <p class="my-3">Il prodotto non ha varianti</p>
            @else
                <h4 class="my-3">Le varianti di {{ $product->name }} ⬇️</h4>

                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Peso</th>
                            <th scope="col">Prezzo unitario</th>
                            <th scope="col">Quantità</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->variants as $variant)
                            <tr>
                                <td class="align-middle">{{ $variant->weight }}{{ $variant->product->category->unit }}
                                </td>
                                <td class="align-middle">{{ $variant->price }}€</td>
                                <td class="align-middle">{{ $variant->quantity }} pezzi</td>
                                <td class="btn-group btn-group-sm">
                                    <a class="btn btn-secondary" type="button"
                                        href="{{ route('admin.variants.edit', ['variant' => $variant->id]) }}">
                                        Modifica
                                    </a>
                                    <form id="delete-variant" class="d-none"
                                        action="{{ route('admin.variants.destroy', ['variant' => $variant->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <a class="btn btn-danger" type="button"
                                        onclick="event.preventDefault(); document.getElementById('delete-variant').submit();">
                                        Elimina
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>  --}}
    </div>



@endsection
