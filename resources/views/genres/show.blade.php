@extends('layouts.copyapp')

@section('content')
    <div class="card">

        <div class="card-header d-flex justify-content-center align-items-center"> {{ $genre->genre }} </div>

        <div class="card-body">

            <p> Created at: {{ $genre->created_at->format('Y-m-d H:i:s') }} </p>
            <p> Updated at: {{ $genre->updated_at->format('Y-m-d H:i:s') }} </p>

            <a href="{{ route('dvds.index') }}" class="btn btn-secondary">Back to DVDs</a>
            <a href="{{ route('genres.index') }}" class="btn btn-secondary">Back to Genres</a>
        </div>
    </div>
@endsection
