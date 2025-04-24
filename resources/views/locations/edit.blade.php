@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card-header">Edit Location</div>

        <div class="card-body">
            <form action="{{ route('locations.update', $location->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location"
                        class="form-control @error('location') is-invalid @enderror"
                        value="{{ old('location') ?? $location->location }}">

                    @error('location')
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
