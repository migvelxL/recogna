@extends('layouts.app')

@section('title', 'Cadastro de usuários')

@section('content')

<div class="custom-msg" id="custom-msg">
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cardCadMaq">
                

                <div class="card-body">
                    <form  method="POST" enctype="multipart/form-data" class="form-cad" action="{{ route('cadastrar') }}">
                        @csrf

                        <div class="title">
                            <h3><b>CADASTRO DE MÁQUINA</b></h3>
                            <hr>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right"><b>Nome da máquina:</b></label>
                            <div class="col-md-6"> 
                                <input type="text" class="form-control" name="nome" placeholder="Nome da máquina" required> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right"><b>Local:</b></label>
                            <div class="col-md-6"> 
                                <input type="text" class="form-control" name="local" placeholder="Local" required> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right"><b>Domínio:</b></label>
                            <div class="col-md-6"> 
                                <input type="text" class="form-control" name="dominio" placeholder="Domínio" required> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right"><b>MAC address:</b></label>
                            <div class="col-md-6"> 
                                <input type="text" class="form-control" name="mac_address" placeholder="MAC address" required> 
                            </div>
                        </div>

                        <br>


                        <button type="submit" class="btn btn-primary">
                            {{ __('CADASTRAR') }}
                        </button>

                    </form>
                    
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
