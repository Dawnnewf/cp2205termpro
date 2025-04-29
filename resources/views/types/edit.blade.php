@extends('layouts.copyapp')

@section('content')
    <div class="card">

        <div class="card-header d-flex justify-content-center align-items-center">Edit Type</div>

        <div class="card-body">
            <form action="{{ route('types.update', $type->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type"
                        class="form-control @error('type') is-invalid @enderror" value="{{ old('type') ?? $type->type }}">

                    @error('type')
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
