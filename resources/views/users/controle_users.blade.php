@extends('layouts.app_pages')

@section('title', 'Usuários')

@section('content')

<div class="custom-msg" id="custom-msg">
</div>

<div class="controle">
    <div class="container">
        <div class="title">
            <h3><b>CONTROLE DE USUÁRIOS</b></h3>
            <hr>
        </div>
        <br>
        <form method="POST" action="{{ route('controle_user.pesquisa') }}" class="filtros">
            <button class="p" disabled>Filtrar por:</button>
            @csrf
            <input placeholder="Nome do usuário" class="form-control" name="name">
            <input placeholder="Máquina em uso" class="form-control" name="id_maq">
            <input placeholder="Email" type="email" class="form-control" name="email">
            <select name="ativo" class="select-control">
                <option value="" selected>Status</option>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
            <select name="tipo" class="select-control">
                <option value="" selected>Tipo </option>
                <option value="1">Administrador</option>
                <option value="0">Usuário Comum</option>
            </select>
            <button type="submit" class="btn btn-primary">
                {{ __('PESQUISAR') }}
            </button>

        </form>
        <br>
        <br>


        <?php $nuns = 0; ?>
            @foreach ($results as $results)
                    <div class="fundo">
                        <div class="frente">
                            <table class="table table-striped table-red" style="margin-top: 4px; margin-left: 10px;">
                                <thead class="cima">
                                <tr>
                                    <th><div class="nome">Nome</div></th>
                                    <th><div class="email">Email</div></th>
                                    <th><div class="telefone">Telefone</div></th>
                                    <th><div class="maq">Máquina em uso</div></th>
                                    <th><div class="adm">Tipo de usuário</div></th>
                                    <th><div class="status">Status</div></th>
                                    
                                </tr>
                                </thead>
                                <tbody class="baixo"> 
                                    <tr>
                                    <td><div class="nome">{{$results->name}}</div></td>
                                    <td><div class="email">{{$results->email}}</div></td>
                                    <td><div class="telefone">{{$results->telefone}}</div></td>
                                    <td><div class="maq"><?php if($results->nome == '') {echo 'Nenhuma máquina';} else{ echo $results->nome; }?></div></td>
                                    <td><div class="adm"><?php if($results->adm == 1) {echo 'Administrador';} else{ echo 'Usuário comum'; }?></div></td>
                                    <td><div class="status"><?php if($results->ativo == 1) {echo 'Ativo';} else{ echo 'Inativo'; }?></div></td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="booes">
                                <a href="{{ url('/alt_users', $results->id) }}">
                                    <button type="submit" class="btn btn-primary" style="margin-bottom: 2px; margin-top: 10.5px;">
                                        {{ __('Alterar') }}
                                    </button>
                                </a>

                                @if($results->email == Auth::user()->email)
                                    <a href="{{ url('/del_users', $results->id) }}" style="pointer-events: none; display: inline-block">
                                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;" disabled>
                                            {{ __('Excluir') }}
                                        </button>
                                    </a>
                                @else
                                    <a href="{{ url('/del_users', $results->id) }}">
                                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
                                            {{ __('Excluir') }}
                                        </button>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>

                    <br>
                    <?php $nuns++; ?>
            @endforeach
            @if($nuns == 0)
                <div style="text-align: center; font-size: 18px; color: #6b5f5f;"><i>Nenhum registro</i></div>
            @endif

        <br>
        <br>

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







