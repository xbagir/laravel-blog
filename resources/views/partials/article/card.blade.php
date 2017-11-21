<!-- First Blog Post -->
<h2>
    <a href="{{route('article.show', [$article->id, $article->slug])}}">{{$article->title}}</a>
</h2>
<p class="lead">{{$article->user->name}}</p>
<p>
    <span class="glyphicon glyphicon-time"></span>
    {{ $article->created_at }}
</p>
<hr>
<img class="img-responsive" src="{{$article->image}}" alt="">
<hr>
<p>{{$article->subtitle}}</p>
<a class="btn btn-primary" href="{{route('article.show', [$article->id, $article->slug])}}">
    Read More <span class="glyphicon glyphicon-chevron-right"></span>
</a>
<hr>