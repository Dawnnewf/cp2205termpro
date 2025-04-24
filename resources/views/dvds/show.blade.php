@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ $dvd->title }}</div>

        <div class="card-body">
            <img class="dvd-img" src="{{ url($dvd->imageLink) }}" alt="picture">

            <p><span class="lbl">DVD Format:</span><span class="dvd-info">{{ $dvd->dvdFormat->dvdFormat }}</span></p>

            <p><span class="lbl">DVD Type:</span><span class="dvd-info">{{ $dvd->Type->type }}</span></p>

            <p><span class="lbl">Storage Location:</span><span class="dvd-info">{{ $dvd->Location->location }}</span></p>

            <p><span class="lbl">Official Website:</span><br><span class="dvd-links">{{ $dvd->website }}</span>
            </p>

            <p><span class="lbl">Imdb Link:</span><br><span class="dvd-links">{{ $dvd->imdbLink }}</span></p>

            <p><span class="lbl">Rating:</span><span class="dvd-info">{{ $dvd->starRating }}</span></p>

            @php $rating = $dvd->starRating; @endphp

            @foreach (range(1, 5) as $i)
                <span class="fa-stack" style="width:1em">
                    <i class="far fa-star fa-stack-1x"></i>

                    @if ($rating > 0)
                        @if ($rating > 0.5)
                            <i class="fas fa-star fa-stack-1x"></i>
                        @else
                            <i class="fas fa-star-half fa-stack-1x"></i>
                        @endif
                    @endif
                    @php $rating--; @endphp
                </span>
            @endforeach

            <p><span class="lbl">Number of Disks:</span><span class="dvd-info">{{ $dvd->numDisks }}</span>
            </p>

            @if ($dvd->Type->type === 'TV-Show' || $dvd->Type->type === 'Mini-Series')
                <p><span class="lbl">Number of Episodes:</span><span class="dvd-info">{{ $dvd->numEpisode }}</span></p>
            @endif

        </div>

        <a href="{{ route('dvds.index') }}" class="btn btn-secondary">Back to DVDs</a>
    </div>
@endsection
