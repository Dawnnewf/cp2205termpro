@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($genres as $genre)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $genre->genre }}</div>

                    <div class="card-footer"> <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('genres.destroy', $genre->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
