@extends('layouts.copyapp')

@section('content')
    <div class="row">
        @foreach ($locations as $location)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-center align-items-center">{{ $location->location }}</div>

                    <div class="card-footer">
                        <a href="{{ route('locations.show', $location->id) }}" class="btn btn-primary">View</a>

                        @auth
                            <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('locations.destroy', $location->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endauth

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
