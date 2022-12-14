@extends('layouts.app_pages_user')

@section('title', 'Contatos')

@section('content')
<div class="container">

    <div class="title">
        <h3><b>CONTATOS DISPONÍVEIS</b></h3>
        <hr>
    </div>

    <br>


    @foreach ($results as $results)

    <div class="names">
        <i class="fas fa-user" style="color: #6610f2; margin-right: 10px;"></i><b>{{$results->name}}</b>
    </div>

    <div class="subnames">

        <i class="fas fa-at" style="color: #255EED; margin-right: 10px;"></i> {{$results->email}}

        <br>

        <i class="fas fa-phone-alt" style="color: #255EED; margin-right: 10px;"></i> {{$results->telefone}}

    </div>

    <br><br>

    @endforeach


@endsection