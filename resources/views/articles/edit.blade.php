@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('messages.error')
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <h1>Editer un article</h1>

                    <form method="POST" action="{{route('article.update', $article->id) }}">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <input class="form-control" type="text" name="title"
                               value="{{ $article->title }}" placeholder="Titre">

                        <textarea class=form-control" name="body" placeholder="Contenu">
                            {{ $article->content }}
                        </textarea>
                        <input type="submit" value="Publier" class="btn btn-info">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
