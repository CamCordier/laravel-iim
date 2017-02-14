@extends('layouts.app')

@section('content')

<img src="img/background2.jpg" class="background">

<div class="pagewelcome">
<h1 style="text-align: center";> - Classement des 10 meilleurs restaurants à Paris </h1>
</div>
<a href="{{ url('/article') }}" class="myButton">Découvrir</a>
@endsection
