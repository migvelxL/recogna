@extends('layouts.app_users')

@section('title', 'Área do usuário')

@section('content')

<div class="custom-msg" id="custom-msg">
</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardArea">
                    

                    <div class="card-body">
                        <form class="form-cad">
                            @csrf

                            <div class="title">
                                <h3><b>ÁREA DO USUÁRIO</b></h3>
                                <hr>
                            </div>
                            
                            @foreach ($results as $results)
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right"><b>Nome do usuário:</b></label>
                                    <div class="col-md-6"> 
                                        <input type="text" class="form-control" placeholder="Nome:" value="{{ $results->name }}" disabled> 
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right"><b>Email:</b></label>
                                    <div class="col-md-6"> 
                                        <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ $results->email }}" disabled> 
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right"><b>Máquina em uso:</b></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="maquina" value="<?php if($results->nome == '') {echo 'Nenhuma máquina em uso';} else{ echo $results->nome; } ?>" value="{{ $results->nome }}" disabled>
                                    </div>
                                </div>

                                @if ($results->id != '')
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right"><b>Prazo:</b></label>
                                        <div class="col-md-6"> 
                                            <input type="text" class="form-control" name="prazo" value="{{ $results->prazo }}" placeholder="Prazo" disabled> 
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right"><b>Paper:</b></label>
                                        <div class="col-md-6"> 
                                            <input type="text" class="form-control" name="paper" value="{{ $results->paper }}" placeholder="Paper" disabled> 
                                        </div>
                                    </div>
                                @endif

                            @endforeach

                            <br>

                        </form> 

                        @if ($results->id != '')
                            <a href="{{ url('/alt', $results->id) }}">
                                <button class="btn btn-primary">
                                    {{ __('Alterar') }}
                                </button>
                            </a>
                        @endif

                    
                        <button type="submit" class="btn btn-primary" style="margin-left: 20px;"> 
                                          
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <div class="btn_logout">
                                            <div class="fechar">
                                                {{ __('Logout') }}
                                            </div>
                                        </div>
                                    </a>
                                


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    @if ($msg != null)
        <script>
            customMsg('{{ $msg[1] }}', '{{ $msg[0] }}')
        </script>
    @endif
@endpush