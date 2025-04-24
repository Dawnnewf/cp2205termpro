@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create New DVD Storage Dvd Format</div>

        <div class="card-body">
            <form action="{{ route('dvdformats.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="dvdFormat">Dvd Format</label>

                    <input dvdFormat="text" name="dvdFormat" id="dvdFormat"
                        class="form-control @error('dvdFormat') is-invalid @enderror" value="{{ old('dvdFormat') }}">

                    @error('dvdFormat')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
