@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('messages.success')
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <h1>Liste des taches</h1>
                    <ul>
                            @foreach($articles as $article)
                            <a href="{{ route('article.show', $article->id) }}">{{$article->body}}</a>
                            @endforeach
                    </ul>
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
