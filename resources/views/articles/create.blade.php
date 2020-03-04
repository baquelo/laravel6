@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

            <form method="post" action="/articles">
                @csrf

                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input
                            type="text"
                            class="input {{ $errors->has('title') ? 'is-danger' : '' }}"
                            name="title"
                            id="title"
                            value="{{ old('title') }}">
                        @if($errors->has('title'))
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger @enderror" name="excerpt"
                                  id="excerpt">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                        <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">Body</label>

                    <div class="control">
                        <textarea class="textarea {{ $errors->has('body') ? 'is-danger' : '' }}" name="body"
                                  id="body">{{ old('body') }}</textarea>
                        @if($errors->has('body'))
                            <p class="help is-danger">{{ $errors->first('body') }}</p>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">Tags</label>

                    <div class="select is-multiple control">
                        <select
                            multiple
                            name="tags[]">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('tags'))
                            <p class="help is-danger">{{ $message }}</p>
                        @endif
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
