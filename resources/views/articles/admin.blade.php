@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="content">
            <div class="title m-b-md">
                Paris foodlove - Administrateur -
            </div>
            <br><br>
            <div class="resto">
                <img class="img-responsive" src="http://www.anous.fr/sites/default/files/visuel/websoongrillg.jpg" alt="">
            </div>
        </div>
        <div class="page2">
            <p>Nos restaurants <br>pour la Saint-Valentin</p>
        </div>


        <div class="pres">
            <h2>Pour une soirée inoubliable</h2>
            <p>Inviter votre amoureuse dans un restaurant pour la Saint Valentin,
                c'est bien mais pour marquer le coup et lui offrir une soirée inoubliable,
                le choix d'un restaurant original, c'est encore mieux.
                Ce 14 février 2017 arrivant à grand pas,
                il est plus que temps de réserver pour ne pas vous retrouver le bec dans l'eau.
                <br>Nous vous avons réuni les adresses des 10 meilleurs restaurants de Paris pour la plus belle Saint-Valentin.
            </p>
        </div>

        <div class="panel panel-default">
            <h1 style="text-align: center;">Rajouter un article</h1>
            <br><br>
            {!! Form::open(['action'=>'ArticleController@store', 'files'=>true]) !!}
            {{ csrf_field() }}


            <div class="form-group">
                {!! Form::label('title', 'Titre:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('body', 'Contenu:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>5] ) !!}
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('image', 'Choisir une image') !!}
                {!! Form::file('image') !!}
            </div>
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::submit('Publier', array( 'class'=>'btn btn-danger form-control' )) !!}
            </div>
            {!! Form::close() !!}

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
                        <img src="{!! '/images/'.$article->filePath !!}" style="width:100%; height:150%;  margin-right:25px;">
                        <br>
                        <article>
                            <br>
                            {!! str_limit($article->body, $limit = 150, $end = '.......') !!}
                        </article>
                        <br>

                        <i><a  href="{{ route('article.show', $article->id) }}">En savoir plus ici</a></i>
                        <br><hr>

                        <br>
                        <form method="POST" action="{{ route('admin.destroy', $article->id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                            <br><br>
                        </form>

                    @endforeach
                </ul>

                {{$articles->links()}}

            </div>
        </div>

    </div>

@endsection
