@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create New DVD Location</div>

        <div class="card-body">
            <form action="{{ route('locations.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="location">Location</label>

                    <input type="text" name="location" id="location"
                        class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">

                    @error('location')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
