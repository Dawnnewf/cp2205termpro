@extends('layouts.copyapp')

@section('content')
    <h1 class="ptitle py-5 text-center font-bold">My DVD Collection</h1>

    <livewire:search></livewire:search>

    <div class="row">
        @foreach ($dvds as $dvd)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-center align-items-center">{{ $dvd->title }}</div>

                    <div class="card-body">

                        <div class="row py-2 d-flex justify-content-center" name="image">
                            <img class="dvd-img" src="{{ $dvd->imageLink }}" alt="picture">
                        </div>

                        <div class="row py-2" name="format">
                            <div class="col-md-5">
                                <span class="lbl">DVD Format:</span>
                            </div>

                            <div class="col-md-7">
                                <span class="dvd-info">{{ $dvd->dvdFormat->dvdFormat }}</span>
                            </div>
                        </div>

                        <div class="row py-2" name="type">
                            <div class="col-md-5">
                                <span class="lbl">DVD Type:</span>
                            </div>

                            <div class="col-md-7">
                                <span class="dvd-info">{{ $dvd->Type->type }}</span>
                            </div>
                        </div>

                        <div class="row py-2" name="location">
                            <div class="col-md-5">
                                <span class="lbl">Storage Location:</span>
                            </div>

                            <div class="col-md-7">
                                <span class="dvd-info">{{ $dvd->Location->location }}</span>
                            </div>
                        </div>

                        <div class="row py-2" name="website">
                            <div class="col-md-5">
                                <span class="lbl">Official Website:</span>
                            </div>

                            <div class="col-md-7">
                                <span class="dvd-links">{{ $dvd->website }}</span>
                            </div>
                        </div>

                        <div class="row py-2" name="imdb">
                            <div class="col-md-5">
                                <span class="lbl">Imdb Link:</span>
                            </div>

                            <div class="col-md-7">
                                <span class="dvd-links">{{ $dvd->imdbLink }}</span>
                            </div>
                        </div>

                        <div class="row py-2" name="stars">
                            <div class="col-md-5">
                                <span class="lbl">Rating:</span>
                            </div>

                            <div class="col-md-7">
                                @php $rating = $dvd->starRating; @endphp

                                @foreach (range(1, 5) as $i)
                                    <span class="fa-stack" style="width:1em">
                                        <i class="fa-regular fa-star fa-stack-1x"></i>

                                        @if ($rating > 0)
                                            @if ($rating > 0.5)
                                                <i class="fa-solid fa-star fa-stack-1x"></i>
                                            @else
                                                <i class="fa-solid fa-star-half-stroke fa-stack-1x"></i>
                                            @endif
                                        @endif
                                        @php $rating--; @endphp
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="row py-2" name="disks">
                            <div class="col-md-5">
                                <span class="lbl">Number of Disks:</span>
                            </div>

                            <div class="col-md-7">
                                <span class="dvd-info">{{ $dvd->numDisks }}</span>
                            </div>
                        </div>

                        @if ($dvd->Type->type === 'TV-Show' || $dvd->Type->type === 'Mini-Series')
                            <div class="row py-2" name="episodes">
                                <div class="col-md-5">
                                    <span class="lbl">Number of Episodes:</span>
                                </div>

                                <div class="col-md-7">
                                    <span class="dvd-info">{{ $dvd->numEpisode }}</span>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="card-footer">
                        <a href="{{ route('dvds.show', $dvd->id) }}" class="btn btn-primary">View</a>

                        @auth
                            <a href="{{ route('dvds.edit', $dvd->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('dvds.destroy', $dvd->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endauth

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $dvds->links() }}

    @auth
        <div class="create-btn">
            <a href="{{ route('dvds.create') }}" class="btn btn-secondary">Create New DVD</a>
        </div>
    @endauth
@endsection
