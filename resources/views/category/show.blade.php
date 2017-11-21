@extends('layouts.app')

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="page-header">
            Articles
            <small>by category: {{$category->name}}</small>
        </h1>

        @if($articles->isEmpty())
            Nothing ...
        @endif

        @each('partials.article.card', $articles, 'article')

    </div>

    @include('partials/article/widgets')

@endsection