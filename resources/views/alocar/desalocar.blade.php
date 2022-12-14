@extends('layouts.app_forms')
    

@section('title', 'Desalocação')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardAlterar">
                    

                    <div class="card-body">
                        <form action="{{ url('/desalocacao', $maq[0]->id_maq)}}" method="POST" enctype="multipart/form-data" class="form-cad">
                            @csrf

                            <div class="title">
                                <h3><b>DESALOCAÇÃO DA MÁQUINA</b></h3>
                                <hr>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Nome da máquina:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="nome" value="{{ $maq[0]->nome }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Mac Address:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="mac_address" value="{{ $maq[0]->mac_address }}" disabled> 
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Domínio:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="dominio" value="{{ $maq[0]->dominio }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Prazo:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="prazo" value="{{ $maq[0]->prazo }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Paper:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="paper" value="{{ $maq[0]->paper }}" disabled> 
                                </div>
                            </div>

                            
                            <br>

                            <div class="botoes">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Desalocar') }}
                                </button>
                            </div>
                        </form>

                        <a href="{{ url('/controle_maq') }}">
                            <div class="fechar">
                                <button class="btn btn-primary">
                                        {{ __('Voltar') }}      
                                </button>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

