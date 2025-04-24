@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create New DVD Storage Genre</div>

        <div class="card-body">
            <form action="{{ route('genres.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="genre">Genre</label>

                    <input genre="text" name="genre" id="genre"
                        class="form-control @error('genre') is-invalid @enderror" value="{{ old('genre') }}">

                    @error('genre')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
