@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="content">
            <div class="title m-b-md">
                Paris foodlove
            </div>
            <br><br>
            <div class="resto">
                <img class="img-responsive" src="http://www.anous.fr/sites/default/files/visuel/websoongrillg.jpg" alt="">
            </div>
        </div>
        <div class="page2">
            <p>Nos restaurants Spécial <br> Saint-Valentin</p>
        </div>


        <div class="pres">
            <h2>Bienvenue</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.U
                t enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u
                t aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                qui officia deserunt mollit anim id est laborum
            </p>
        </div>

        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                @include('messages.success')
                <ul>
                    @foreach($articles as $article)
                        <h2>
                            <a href="{{ route('article.show', $article->id) }}">{{$article->title}}</a>
                        </h2>

                        <p>Posté le {{$article->created_at}}</p>
                        <br><br><br><br><br>
                        <img class="img-responsive" src="http://www.anous.fr/sites/default/files/visuel/websoongrillg.jpg" alt="">
                        <br><article>
                            {!! str_limit($article->body, $limit = 150, $end = '.......') !!}
                        </article>
                        <br>

                        <i><a  href="{{ route('article.show', $article->id) }}">Read More</a></i>
                        <br><hr>

                        <br>
                    @endforeach
                </ul>

                {{$articles->links()}}
            </div>
        </div>

    </div>

@endsection
