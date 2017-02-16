@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('messages.error')
                <h1>Contactez-nous</h1>
                <div class="ligne"></div>
                    <br>

                        <form method="post" action="{{route('contact.store')}}">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">Nom</label>
                            <div class="col-md-9">
                                <input id="name" name="name" type="text" placeholder="Votre nom" class="form-control">
                            </div>
                        </div>

                        <!-- Email input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">E-mail</label>
                            <div class="col-md-9">
                                <input id="email" name="email" type="text" placeholder="Votre email" class="form-control">
                            </div>
                        </div>

                        <!-- Message body -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="message">Votre message</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="message" name="message" placeholder="Entrer votre message ici..." rows="5"></textarea>
                            </div>
                        </div>


                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <br>
                                <button type="submit" class="btn btn-secondary btn-lg">Envoyer</button>
                            </div>
                        </div>
                            <img src="img/Fichier3.png">

            </div>
        </div>
    </div>
    </form>
@endsection
