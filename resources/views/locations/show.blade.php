@extends('layouts.copyapp')

@section('content')
    <div class="card">

        <div class="card-header d-flex justify-content-center align-items-center"> {{ $location->location }} </div>

        <div class="card-body">

            <p> Created at: {{ $location->created_at->format('Y-m-d H:i:s') }} </p>
            <p> Updated at: {{ $location->updated_at->format('Y-m-d H:i:s') }} </p>

            <a href="{{ route('dvds.index') }}" class="btn btn-secondary">Back to DVDs</a>
            <a href="{{ route('locations.index') }}" class="btn btn-secondary">Back to Locations</a>
        </div>
    </div>
@endsection
