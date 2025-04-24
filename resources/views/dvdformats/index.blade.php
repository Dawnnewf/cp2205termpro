@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($dvdformats as $dvdformat)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $dvdformat->dvdFormat }}</div>

                    <div class="card-footer">
                        <a href="{{ route('dvdformats.show', $dvdformat->id) }}" class="btn btn-primary">View</a>

                        <a href="{{ route('dvdformats.edit', $dvdformat->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('dvdformats.destroy', $dvdformat->id) }}" method="post" class="d-inline">
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
