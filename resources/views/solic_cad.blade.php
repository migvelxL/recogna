@extends('layouts.app_init')

@section('title', 'Solicitação de cadastro')

@section('content')

<div class="custom-msg" id="custom-msg">
</div>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardSolicit">
                    

                    <div class="card-body">
                        <form action="{{ route('solicitacao') }}" method="POST" >
                            @csrf

                            <div class="title">
                                <h3><b>SOLICITAÇÃO PARA CADASTRO</b></h3>
                                <hr>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="name" placeholder="Nome do usuário" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="Email" class="form-control" name="email" required autocomplete="email">

                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="telefone" type="tel" placeholder="Telefone" class="form-control" name="telefone" required autocomplete="tel">

                                </div>
                            </div>

                            <br>

                            
                            <button type="submit" class="btn btn-primary">
                                {{ __('Solicitar') }}
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
