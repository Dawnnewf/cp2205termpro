@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card-header">Edit Genre</div>

        <div class="card-body">
            <form action="{{ route('genres.update', $genre->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre"
                        class="form-control @error('genre') is-invalid @enderror"
                        value="{{ old('genre') ?? $genre->genre }}">

                    @error('genre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
