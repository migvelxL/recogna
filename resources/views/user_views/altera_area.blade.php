@extends('layouts.app_forms')

@section('title', 'Alteração de dados')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardAlterar" style="height: 370px; margin-top: 85px;">

                    <div class="card-body">
                        <form action="{{ url('/update', $usuario[0]->id_user) }}" method="POST" enctype="multipart/form-data" class="form-cad">
                            @csrf

                            <div class="title">
                                <h3><b>ALTERAR DADOS</b></h3>
                                <hr>
                            </div>


                                    <label><b>Máquina em uso</b></label>
                                        <p style="padding-top: 5px; background-color: white; border-color: white; color: #6610f2;"><b>{{ $usuario[0]->nome }}</b></p>



                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Prazo:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="prazo" placeholder="Prazo:" value="{{ $usuario[0]->prazo }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Paper:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="paper" placeholder="Paper:" value="{{ $usuario[0]->paper }}" required>
                                </div>
                            </div>

                            <br>

                              
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Alterar') }}
                            </button>
                            

                            


                        </form>

                        <a href="{{ URL::previous() }}">
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

