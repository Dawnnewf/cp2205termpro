@extends('layouts.copyapp')

@section('content')
    <div class="row">
        @foreach ($dvdformats as $dvdformat)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-center align-items-center">{{ $dvdformat->dvdFormat }}
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('dvdformats.show', $dvdformat->id) }}" class="btn btn-primary">View</a>

                        @auth
                            <a href="{{ route('dvdformats.edit', $dvdformat->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('dvdformats.destroy', $dvdformat->id) }}" method="post" class="d-inline">
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
