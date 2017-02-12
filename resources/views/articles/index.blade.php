@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="content">
            <div class="title m-b-md">
                Paris foodlove
            </div>
        </div>

        <h1 class="page-header">
            Nos restaurants Spécial Saint-Valentin
        </h1>

        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-10">

            @include('messages.success')
                    <ul>
                        @foreach($articles as $article)
                            <h2>
                                <a href="{{ route('article.show', $article->id) }}">{{$article->title}}</a>
                            </h2>

                            <p class="lead">
                                by <a href="{{ route('article.show', $article->id) }}">{{$article->title}}</a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$article->created_at}}</p>
                            <img class="img-responsive" src="http://www.anous.fr/sites/default/files/visuel/websoongrillg.jpg" alt="">
                        <br>{{$article->body}}
                        <br>
                        <br>
                            <a class="btn btn-primary" href="{{ route('article.show', $article->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                            <br><br><hr>

                            <br>
                        @endforeach
                    </ul>

                    {{$articles->links()}}
            </div>
     </div>

</div>

@endsection
