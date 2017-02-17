@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @if(Auth::check() and auth()->user())
                    <h1>- {{$article->title}} -</h1>
                    <hr>
                    <br><br>
                    <br><br>
                    <img src="{!! '/images/'.$article->filePath !!}" style="width:100%; height:150%;  margin-right:25px;">
                    <br><br>
                    <div class="panel-body">
                        <ul>
                            {{$article->body}}
                            <br><br> <p><i>Posté le {{$article->created_at}}</i></p>
                            <strong>Par : {{ $article->user->name }}</strong>
                            <br><br>
                            <p>Partager sur :
                                @include('component.share', [
                                    'url' => request()->fullUrl(),
                                    'description' => 'This is really cool link',
                                    'image' => 'http://placehold.it/300x300?text=Cool+link'
                                   ])
                            </p> <br>
                            @if(Auth::check() and auth()->user()->isAdmin)
                                <a href=" {{ route('article.create',$article->id) }}"
                                   class="btn btn-primary"> Modifier</a>
                                <form method="POST" action="{{ route('article.destroy', $article->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="submit" value="Supprimer" class="btn btn-danger">
                                    <br><br>
                                </form>
                            @endif
                            {{ csrf_field() }}

                        </ul>
                    </div>
                    <hr>

                @else
                   @include('auth.register')
                @endif
            </div>
        </div>
    </div>
    </div>


@endsection