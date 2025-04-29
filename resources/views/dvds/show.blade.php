@extends('layouts.copyapp')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-center align-items-center">{{ $dvd->title }}</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img class="dvd-img" src="{{ url($dvd->imageLink) }}" alt="picture">
                </div>

                <div class="col-md-6" id="show-info">

                    <div class="row py-2" name="format">
                        <div class="col-md-3"><span class="lbl">DVD Format:</span></div>

                        <div class="col-md-9">
                            <span class="dvd-info">{{ $dvd->dvdFormat->dvdFormat }}</span>
                        </div>

                    </div>

                    <div class="row py-2" name="type">
                        <div class="col-md-3">
                            <span class="lbl">DVD Type: </span>
                        </div>

                        <div class="col-md-9">
                            <span class="dvd-info"> {{ $dvd->Type->type }} </span>
                        </div>
                    </div>

                    <div class="row py-2" name="location">
                        <div class="col-md-3">
                            <span class="lbl">Storage Location: </span>
                        </div>

                        <div class="col-md-9">
                            <span class="dvd-info"> {{ $dvd->Location->location }} </span>
                        </div>
                    </div>

                    <div class="row py-2" name="website">
                        <div class="col-md-3">
                            <span class="lbl">Official Website: </span>
                        </div>

                        <div class="col-md-9">
                            <span class="dvd-links"> {{ $dvd->website }} </span>
                        </div>
                    </div>

                    <div class="row py-2" name="imdb">
                        <div class="col-md-3">
                            <span class="lbl">IMDb Link: </span>
                        </div>

                        <div class="col-md-9">
                            <span class="dvd-links"> {{ $dvd->imdbLink }} </span>
                        </div>
                    </div>

                    <div class="row py-2" name="stars">
                        <div class="col-md-3">
                            <span class="lbl">Rating: </span>
                        </div>

                        <div class="col-md-9">
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
                        <div class="col-md-3">
                            <span class="lbl">Number of Disks: </span>
                        </div>

                        <div class="col-md-9">
                            <span class="dvd-info"> {{ $dvd->numDisks }} </span>
                        </div>
                    </div>

                    @if ($dvd->Type->type === 'TV-Show' || $dvd->Type->type === 'Mini-Series')
                        <div class="row py-2" name="episodes">
                            <div class="col-md-3">
                                <span class="lbl">Number of Episodes: </span>
                            </div>

                            <div class="col-md-9">
                                <span class="dvd-info">{{ $dvd->numEpisode }} </span>
                            </div>
                        </div>
                    @endif

                    <div class="row py-2" name="genres">
                        <div class="col-md-3">
                            <span class="lbl">Genres:</span>
                        </div>

                        <div class="col-md-9">
                            <ul>
                                @foreach ($genres as $genre)
                                    @if ($dvd->genres->contains($genre))
                                        <li> {{ $genre->genre }} </li>
                                    @endif
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('dvds.index') }}" class="btn btn-secondary">Back to DVDs</a>
    </div>
@endsection
