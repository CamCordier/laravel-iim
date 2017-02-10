@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                       @if(Auth::check())
                       Vous êtes bien connecté !

                        <ul>
                        <li>Mon id : {{ Auth::user()->id }}</li>
                        <li>Mon nom : {{ Auth::user()->name }}</li>
                        <li>Mon email : {{ Auth::user()->email }}</li>
                        <li>Date de création : {{ Auth::user()->created_at }}</li>
                        </ul>
                    <ul>
                           @foreach($articles = Auth::user()->articles as $article)
                               <li>{{ $article->body }}</li>
                           @endforeach
                    </ul>
                       @else
                       Vous n'êtes pas connecté !
                       @endif
                </div>
            </div>
        </div>
    </div>
@endsection
