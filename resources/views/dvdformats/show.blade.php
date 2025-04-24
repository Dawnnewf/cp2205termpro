@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card-header"> {{ $dvdformat->dvdFormat }} </div>

        <div class="card-body">

            <p> Created at: {{ $dvdformat->created_at->format('Y-m-d H:i:s') }} </p>
            <p> Updated at: {{ $dvdformat->updated_at->format('Y-m-d H:i:s') }} </p>

            <a href="{{ route('dvds.index') }}" class="btn btn-secondary">Back to DVDs</a>
            <a href="{{ route('dvdformats.index') }}" class="btn btn-secondary">Back to Dvdformats</a>
        </div>
    </div>
@endsection
