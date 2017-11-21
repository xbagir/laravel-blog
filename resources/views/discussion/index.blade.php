@extends('layouts.app')

@section('content')
    @forelse ($discussions as $discussion)
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="{{$discussion->image}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">
                    <a href="{{route('discussion.show', $discussion->id)}}">{{$discussion->title}}</a>
                </h4>
                <p>{{$discussion->user->name}}</p>
                Replies: <strong>{{$discussion->comments->count()}}</strong>
            </div>
        </div>
    @empty
        <p>No users</p>
    @endforelse
@endsection