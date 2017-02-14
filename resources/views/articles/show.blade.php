@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12">


                <!-- Title -->
                <h1>- {{$article->title}} -</h1>

                <hr>
                <br><br>   <br><br>


                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <div class="panel-body">
                    <ul>
                        {{$article->body}}
                        <br><br>
                        {{$article->user->name }}<br>
                        <p><i>Posté le {{$article->created_at}}</i></p>

                       <p>Partager sur : @include('component.share', [
            'url' => request()->fullUrl(),
            'description' => 'This is really cool link',
            'image' => 'http://placehold.it/300x300?text=Cool+link'
        ]) </p>



                        <br>
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
                <hr>



                <h4>Leave a Comment:</h4>
                    <form method="POST" action="{{route('article.store')}}">

                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="on_post" value="{{ $article->id }}">
                        <input type="hidden" name="slug" value="{{ $article->slug }}">
                        <div class="form-group">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                <hr>



                <!-- Comment -->
                <div class="media">

                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>
            </div>
@endsection