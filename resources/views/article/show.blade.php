@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <h1>{{$article->title}}</h1>

        <p class="lead">{{$article->user->name}}</p>

        <hr>

        <p>
            <span class="glyphicon glyphicon-time"></span>
            {{ $article->created_at }}
        </p>

        <hr>

        <img class="img-responsive" src="{{$article->image}}" alt="">

        <hr>

        <p class="lead">{{$article->subtitle}}</p>
        <p>{{$article->title}}</p>

        <hr>

        @auth
            <div class="well">
                <h4>
                    Leave a Comment:
                </h4>

                <form role="form" method="post" action="{{ route('article.comment.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <input  type="hidden" name="articleId" value="{{$article->id}}">
                        <textarea name="content" class="form-control" rows="3" required>{{ old('content') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
            <hr>
        @endauth

        @forelse ($article->comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="{{$comment->user->image ?? 'http://placehold.it/64x64'}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">
                        {{$comment->user->name}}
                        <small>{{$comment->created_at->toFormattedDateString()}}</small>
                     </h4>
                    {{$comment->content}}.
                </div>
            </div>
        @empty
            <p>No comments ...</p>
        @endforelse

    </div>

    @include('partials.article.widgets')
@endsection

