@extends('layout')

@section('content')
    <div id="wrapper">
        <h2>
            <a href="/articles/create">Create Article</a>
        </h2>
        <div id="page" class="container">
            @foreach($articles as $article)
                <div id="content">
                    <div class="title">
                        <h2>
                            <a href="{{ $article->path }}">
                                {{ $article->title }}
                            </a>
                        </h2>
                        <p>
                            <img
                                src="/images/banner.jpg"
                                alt=""
                                class="image image-full"/>
                        </p>

                        {{ $article->excerpt }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
