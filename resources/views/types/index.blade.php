@extends('layouts.copyapp')

@section('content')
    <div class="row">
        @foreach ($types as $type)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-center align-items-center">{{ $type->type }}</div>

                    <div class="card-footer">
                        <a href="{{ route('types.show', $type->id) }}" class="btn btn-primary">View</a>

                        @auth
                            <a href="{{ route('types.edit', $type->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('types.destroy', $type->id) }}" method="post" class="d-inline">
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
