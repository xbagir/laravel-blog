@extends('layouts.app')

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="page-header">
            Articles
            <small>by tag: {{$tag->name}}</small>
        </h1>

        @each('partials.article.card', $articles, 'article')

        @if($articles->isEmpty())
            Nothing ...
        @endif

    </div>

    @include('partials.article.widgets')

@endsection