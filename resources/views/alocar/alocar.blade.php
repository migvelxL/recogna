@extends('layouts.app_forms')
    

@section('title', 'Alocação')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardAlterar">
                    

                    <div class="card-body">
                        <form action="{{ url('/alocacao', $maq_mais[0]->id_maqui)}}" method="POST" enctype="multipart/form-data" class="form-cad">
                            @csrf

                            <div class="title">
                                <h3><b>ALOCAÇÃO DA MÁQUINA</b></h3>
                                <hr>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Nome da máquina:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="nome" value="{{ $maq_mais[0]->nome }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Mac Address:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="mac_address" value="{{ $maq_mais[0]->mac_address }}" disabled> 
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Domínio:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="dominio" value="{{ $maq_mais[0]->dominio }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Prazo:</b></label>
                                <div class="col-md-6"> 
                                    <input type="date" class="form-control" name="prazo" placeholder="Prazo" required> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Paper:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="paper" placeholder="Paper" required> 
                                </div>
                            </div>

                            
                            <br>

                            <div class="botoes">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Alocar') }}
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

