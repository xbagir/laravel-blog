@extends('layouts.app')

@section('content')

    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="{{$discussion->image}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$discussion->title}}</h4>
            {{$discussion->content}}
            <p>{{$discussion->user->name}}</p>
            <br>
            <!-- Nested Comment -->
            @forelse ($discussion->comments as $comment)
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading">
                            <small>
                                <strong>{{$comment->user->name}}</strong>
                                 - {{$comment->created_at}}
                            </small>
                        </h4>
                        {{$comment->content}}
                    </div>
                </div>
            @empty
                <p>No users</p>
            @endforelse
            <!-- End Nested Comment -->
        </div>
    </div>

    @auth
        <hr>
        <div class="well">
            <h4>
                Leave a Comment:
            </h4>
            <form role="form" method="post" action="{{ route('discussion.comment.store') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <input  type="hidden" name="discussionId" value="{{$discussion->id}}">
                    <textarea name="content" class="form-control" rows="3" required>{{ old('content') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    @endauth
@endsection