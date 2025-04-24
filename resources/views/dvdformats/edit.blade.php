@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card-header">Edit Dvd Format</div>

        <div class="card-body">
            <form action="{{ route('dvdformats.update', $dvdformat->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="dvdFormat">Dvd Format</label>
                    <input type="text" name="dvdFormat" id="dvdFormat"
                        class="form-control @error('dvdFormat') is-invalid @enderror"
                        value="{{ old('dvdFormat') ?? $dvdformat->dvdFormat }}">

                    @error('dvdFormat')
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
