@extends('layouts.copyapp')

@section('content')
    <div class="card">

        <div class="card-header d-flex justify-content-center align-items-center">Edit DVD</div>

        <div class="card-body">
            <form action="{{ route('dvds.update', $dvd->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="dvd" id="dvd" value="{{ $dvd->id }}">

                <div class="form-group my-5" name="title">
                    <label for="title">Title</label>

                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $dvd->title }}">

                    @error('title')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-5" name="imageLink">
                    <label for="imageLink">Image Link</label>

                    <input type="text" name="imageLink" id="imageLink"
                        class="form-control @error('imageLink') is-invalid @enderror"
                        value="{{ old('imageLink') ?? $dvd->imageLink }}"></input>

                    @error('imageLink')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-5" name="website">
                    <label for="website">Official Website</label>

                    <input type="url" name="website" id="website"
                        class="form-control @error('website') is-invalid @enderror"
                        value="{{ old('website') ?? $dvd->website }}"></input>

                    @error('website')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-5" name="imdbLink">
                    <label for="imdbLink">IMDb Link</label>

                    <input type="url" name="imdbLink" id="imdbLink"
                        class="form-control @error('imdbLink') is-invalid @enderror"
                        value="{{ old('imdbLink') ?? $dvd->imdbLink }}"></input>

                    @error('imdbLink')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-5" name="numDisks">
                    <label for="numDisks">How many disks?</label>

                    <input type="number" name="numDisks" id="numDisks" min="1"
                        class="form-control @error('numDisks') is-invalid @enderror"
                        value="{{ old('numDisks') ?? $dvd->numDisks }}">

                    @error('numDisks')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-5" name="location">
                    <label for="location_id">Where is it stored?</label>

                    <select name="location_id" id="location_id"
                        class="form-control @error('location_id') is-invalid @enderror">
                        <option value="" disabled selected>Select a DVD type</option>

                        @foreach ($locations as $location)
                            @if ($location->id)
                                <option value="{{ $location->id }}" selected>
                                    {{ $location->location }}
                                </option>
                            @else
                                <option value="{{ $location->id }}"
                                    {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                    {{ $location->location }}
                                </option>
                            @endif
                        @endforeach

                    </select>

                    @error('location_id')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-5" name='dvdFormat'>
                    <label for="dvdformat_id">What is the format of the DVD?</label>

                    <select name="dvdformat_id" id="dvdformat_id"
                        class="form-control @error('dvdformat_id') is-invalid @enderror">
                        <option value="format" disabled selected>Select a DVD format</option>

                        @foreach ($dvdformats as $dvdformat)
                            @if ($dvdformat->id)
                                <option value="{{ $dvdformat->id }}" selected>
                                    {{ $dvdformat->dvdFormat }}
                                </option>
                            @else
                                <option value="{{ $dvdformat->id }}"
                                    {{ old('dvdformat_id') == $dvdformat->id ? 'selected' : '' }}>
                                    {{ $dvdformat->dvdFormat }}
                                </option>
                            @endif
                        @endforeach

                    </select>

                    @error('dvdformat_id')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-5" name='type'>
                    <label for="type_id">What is the type?</label>

                    <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                        <option value="" disabled selected>Select a DVD type</option>

                        @foreach ($types as $type)
                            @if ($type->id)
                                <option value="{{ $type->id }}" selected>
                                    {{ $type->type }}
                                </option>
                            @else
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->type }}
                                </option>
                            @endif
                        @endforeach

                    </select>

                    @error('type_id')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-5"" name="numEpisode">
                    <label for="numEpisode">If this is a TV Show or Mini-Series, how many episodes does it have?</label>

                    <input type="number" name="numEpisode" id="numEpisode" min="1"
                        class="form-control @error('numEpisode') is-invalid @enderror"
                        value="{{ old('numEpisode') ?? $dvd->numEpisode }}">

                    @error('numEpisode')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-5" name="starRating">
                    <label for="starRating">Star Rating - Ratings increase by 1/2 stars</label>

                    <div class="stars">
                        <input type="range" name="starRating" id="starRating" min="0" max="5"
                            step="0.5" list="markers" class="form-control @error('starRating') is-invalid @enderror"
                            value="{{ old('starRating') ?? $dvd->starRating }}">

                        <datalist id="markers">
                            <option value="0" label="0 Stars"></option>
                            <option value="1" label="1 Stars"></option>
                            <option value="2" label="2 Stars"></option>
                            <option value="3" label="3 Stars"></option>
                            <option value="4" label="4 Stars"></option>
                            <option value="5" label="5 Stars"></option>
                        </datalist>
                    </div>


                    @error('starRating')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-5"" name='genre'>
                    <label>What is the genre(s)?</label>

                    <div>
                        @foreach ($genres as $genre)
                            @if ($dvd->genres->contains($genre))
                                <div>
                                    <input type="checkbox" checked name="genres[]" value="{{ $genre->id }}"
                                        id="{{ $genre->name }}">
                                    <label class="font-bold" for="{{ $genre->genre }}">{{ $genre->genre }}</label>
                                </div>
                            @else
                                <div>
                                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                        id="{{ $genre->name }}">
                                    <label class="font-bold" for="{{ $genre->genre }}">{{ $genre->genre }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    @error('genre_id')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
@endsection
