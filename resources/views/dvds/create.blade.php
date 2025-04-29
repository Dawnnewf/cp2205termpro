@extends('layouts.copyapp')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-center align-items-center">Create New DVD</div>

        <div class="card-body">
            <form action="{{ route('dvds.store') }}" method="post">
                @csrf

                <div class="form-group" name="title">
                    <label for="title">Title</label>

                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">

                    @error('title')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" name="imageLink">
                    <label for="imageLink">Image Link</label>

                    <input type="text" name="imageLink" id="imageLink"
                        class="form-control @error('imageLink') is-invalid @enderror"
                        value="{{ old('imageLink') }}"></input>

                    @error('imageLink')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" name="website">
                    <label for="website">Official Website</label>

                    <input type="url" name="website" id="website"
                        class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}"></input>

                    @error('website')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" name="imdbLink">
                    <label for="imdbLink">IMDb Link</label>

                    <input type="url" name="imdbLink" id="imdbLink"
                        class="form-control @error('imdbLink') is-invalid @enderror" value="{{ old('imdbLink') }}"></input>

                    @error('imdbLink')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" name="numDisks">
                    <label for="numDisks">How many disks?</label>

                    <input type="number" name="numDisks" id="numDisks" min="1"
                        class="form-control @error('numDisks') is-invalid @enderror" value="{{ old('numDisks') }}">

                    @error('numDisks')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" name="location">
                    <label for="location_id">Where is it stored?</label>

                    <input type="text" name="location_id" id="location_id"
                        class="form-control @error('location_id') is-invalid @enderror" value="{{ old('location_id') }}">

                    @error('location_id')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" name='dvdFormat'>
                    <label for="dvdformat_id">What is the format of the DVD?</label>

                    <select name="dvdformat_id" id="dvdformat_id"
                        class="form-control @error('dvdformat_id') is-invalid @enderror">
                        <option value="">Select a DVD format</option>

                        @foreach ($dvdformats as $dvdformat)
                            <option value="{{ $dvdformat->id }}"
                                {{ old('dvdformat_id') == $dvdformat->id ? 'selected' : '' }}>
                                {{ $dvdformat->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('dvdformat_id')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" name='type'>
                    <label for="type_id">What is the type?</label>

                    <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                        <option value="">Select a DVD type</option>

                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('type_id')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" name="numEpisode">
                    <label for="numEpisode">If this is a TV Show or Mini-Series, how many episodes does it have?</label>

                    <input type="number" name="numEpisode" id="numEpisode" min="1"
                        class="form-control @error('numEpisode') is-invalid @enderror" value="{{ old('numEpisode') }}">

                    @error('numEpisode')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" name="starRating">
                    <label for="starRating">Star Rating - Ratings increase by 1/2 stars</label>

                    <div class="stars">
                        <input type="range" name="starRating" id="starRating" min="0" max="5"
                            step="0.5" list="markers" class="form-control @error('starRating') is-invalid @enderror"
                            value="{{ old('starRating') }}">

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

                <div class="form-group" name='genre'>
                    <label for="genre_id">What is the genre(s)?</label>

                    @foreach ($genres as $genre)
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}" id="{{ $genre->name }}">
                        <label for="{{ $genre->name }}"></label>
                    @endforeach

                    @error('genre_id')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
