@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create New Book</div>

        <div class="card-body">
            <form action="{{ route('books.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>

                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">

                    @error('title')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="author_id">Author</label>

                    <select name="author_id" id="author_id" class="form-control @error('author_id') is-invalid @enderror">
                        <option value="">Select a author</option>

                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('author_id')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
