@extends('layouts.app')

@section('content')
    <div class="col-md-8">

        <h1 class="page-header">
            Articles
            <small>all</small>
        </h1>

        @if($articles->isEmpty())
            Nothing ...
        @else
            @each('partials.article.card', $articles, 'article')

            {{ $articles->links('pagination.default') }}
        @endif

    </div>

    @include('partials/article/widgets')

@endsection