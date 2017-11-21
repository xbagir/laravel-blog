<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <form role="search" method="get" action="{{route('article.search')}}">
            <div class="input-group">
                <input name="q" type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>

    <!-- Categories -->
    <div class="well">
        <h4>Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{route('article.category', [$category->id, $category->slug])}}">
                                {{$category->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Tags -->
    <div class="well">
        <h4>Tags</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    @foreach ($tags as $tag)
                        <li>
                            <a href="{{route('article.tag', $tag->name)}}">{{$tag->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus
           laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>