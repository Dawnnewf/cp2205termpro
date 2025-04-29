@extends('layouts.copyapp')

@section('content')
    <div class="card">

        <div class="card-header d-flex justify-content-center align-items-center"> {{ $type->type }} </div>

        <div class="card-body">

            <p> Created at: {{ $type->created_at->format('Y-m-d H:i:s') }} </p>
            <p> Updated at: {{ $type->updated_at->format('Y-m-d H:i:s') }} </p>

            <a href="{{ route('dvds.index') }}" class="btn btn-secondary">Back to DVDs</a>
            <a href="{{ route('types.index') }}" class="btn btn-secondary">Back to Types</a>
        </div>
    </div>
@endsection
