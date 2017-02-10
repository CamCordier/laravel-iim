@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h1>{{$article->title}}</h1>
                        <ul>
                            <li>{{$article->body}}</li>
                           {{$article->user->name }}

                            <a href="{{ route('article.edit', $article->id) }}"
                             class="btn btn-primary">Modifier</a>

                            <form method="POST" action="{{ route('article.destroy', $article->id) }}">

                                    {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">

                                <input class="btn btn-danger"
                                       type="submit" value="Supprimer">
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
