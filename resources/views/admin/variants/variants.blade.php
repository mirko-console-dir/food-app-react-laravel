@extends('admin.admindashboard')
@section('content')
<a href="{{ route('variants.create') }}" class="btn btn-lg btn-outline-success mb-1">Add Variant</a>
    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Variant::all() as $variant)
                <tr>
                    <th scope="row">{{ $variant->id }}</th>
                    <td>{{ $variant->name }}</td>
                    <td>{{ $variant->description }}</td>
                    <td>{{ $variant->price }}</td>
                    <td>
                        <div class="btn-group btn-group-lg" role="group">
                          <a href="{{ route('variants.show', ['variant' => $variant->id]) }}" class="btn btn-info">
                            Vedi
                        </a>
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
                    </td>
                    <td>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


