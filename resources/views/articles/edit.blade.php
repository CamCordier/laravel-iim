    @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('messages.error')
                <div class="panel panel-default">
                    <h1>Editer un article</h1>
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
            </div>
        </div>
    </div>
@endsection
