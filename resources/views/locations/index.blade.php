@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($locations as $location)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $location->location }}</div>

                    <div class="card-footer"> <a href="{{ route('locations.show', $location->id) }}"
                            class="btn btn-primary">View</a>
                        <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('locations.destroy', $location->id) }}" method="post" class="d-inline">
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
