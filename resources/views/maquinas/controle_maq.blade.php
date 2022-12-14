@extends('layouts.app_pages')

@section('title', 'Máquinas')

@section('content')

<?php

use Illuminate\Support\Facades\Auth;

?>

<div class="custom-msg" id="custom-msg">
</div>

<div class="controle">
    <div class="container">
        <div class="title">
            <h3><b>CONTROLE DE MÁQUINAS</b></h3>
            <hr>
        </div>


        <br>
        <form method="POST" action="{{ route('controle_maq.pesquisa') }}" class="filtros">
            <button class="p" disabled>Filtrar por:</button>
            @csrf
            <input placeholder="Nome da máquina" class="form-control" type="text" name="nome">
            <input placeholder="Domínio" class="form-control" type="text" name="dominio">
            <input placeholder="Mac Address" type="text" class="form-control" name="mac_address">
            <select name="restrita" class="select-control">
                <option value="" selected>Restritas</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
            <select name="status" class="select-control">
                <option value="" selected>Status</option>
                <option value="1">Ok</option>
                <option value="0">Manutenção</option>
            </select>
            <button type="submit" class="btn btn-primary">
                {{ __('PESQUISAR') }}
            </button>

        </form>
        <br>
        <br>

        <div class="plaq">
            <?php $nuns = 0; $sts = 0; ?>
            <?php $nums=0; ?>
        
            @foreach ($results as $results)

                <?php

                    $nome = 0;
                    $nome = $results->id_maq ;

                    
                    if($results->name == '' || $results->name == NULL)
                    {
                        $sts= 2; //pode alocar
                    } else {
                        $sts = 1;
                    }

                    if($users != 0 || Auth::user()->ativo == 0)
                    {
                        $sts= 1;
                    }

                    if($nome == $users && $results->id_maq != NULL)
                    {
                        $sts = 3; //desalocar
                    }

                    if($results->status == 0 && $nome != $users)
                    {
                        $sts = 1;
                    }
                    
                ?>

                    <?php $nums+=1; ?>


                    <div class="fundomaq">
                        <div class="frentemaq"> 
                            <div class="alinhar">
                                <div class="tit">   
                                    <div class="cols">Nome:</div>
                                    <div class="cols">Mac address:</div>
                                    <div class="cols">Status:</div>
                                    <div class="cols">Restrita:</div>
                                    <div class="cols">Local:</div>
                                    <div class="cols">Domínio:</div>
                                    <div class="cols">CPU:</div>
                                    <div class="cols">GPU:</div>
                                    <div class="cols">RAM:</div>
                                    <div class="cols">Storage:</div>
                                    <div class="cols">Endereço IP:</div>
                                    <div class="cols">Senha:</div>
                                    <div class="cols">Usuário:</div>
                                    <div class="cols">Prazo:</div>
                                    <div class="cols">Paper:</div>
                                </div>
                            
                                <div class="inf">  
                                    <div class="lin">{{$results->nome}}</div>
                                    <div class="lin">{{$results->mac_address}}</div>
                                    <div class="lin"><?php if($results->status == 1) {echo "<i class='fas fa-check-circle' style='color: #1ee317; margin-right: 10px;'></i>Ok";} else{ echo "<i class='fas fa-times-circle' style='color: #e31717; margin-right: 10px;'></i>Manutenção"; }?></div>
                                    <div class="lin"><?php if($results->restrita == 1) {echo "<i class='fas fa-user-lock' style='color: #fcbe03; margin-right: 10px;'></i>Sim";} else{ echo "<i class='fas fa-unlock' style='color: #1ee317; margin-right: 10px;'></i>Não"; }?></div>
                                    <div class="lin">{{$results->local}}</div>
                                    <div class="lin">{{$results->dominio}}</div>
                                    <div class="lin"><?php if($results->cpu == '') {echo '--';} else{ echo $results->cpu; }?></div>
                                    <div class="lin"><?php if($results->gpu == '') {echo '--';} else{ echo $results->gpu; }?></div>
                                    <div class="lin"><?php if($results->ram == '') {echo '--';} else{ echo $results->ram; }?></div>
                                    <div class="lin"><?php if($results->storage == '') {echo '--';} else{ echo $results->storage; }?></div>
                                    <div class="lin"><?php if($results->endereco == '') {echo '--';} else{ echo $results->endereco; }?></div>
                                    <div class="lin"><?php if($results->senha == '') {echo '--';} else{ echo $results->senha; }?></div>
                                    <div class="lin"><?php if($results->name == '') {echo '--';} else{ echo $results->name; }?></div>
                                    <div class="lin"><?php if($results->prazo == '') {echo '--';} else{ echo $results->prazo; }?></div>
                                    <div class="lin"><?php if($results->paper == '') {echo '--';} else{ echo $results->paper; }?></div>
                                </div>
                            </div>

                            

                            <div class="botoes">
                                <a href="{{ url('/mais', $results->id_maqui) }}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Modificar') }}
                                        </button>
                                </a>
                                
                                @if($sts == 3)
                                    <a href=" {{ url('/desalocar', $results->id_maqui) }}">
                                        <button class="btn btn-primary"  style="background-color: #6610f2;">
                                            Desalocar
                                        </button>
                                    </a>

                                @elseif ($sts == 1)

                                    <button class="btn btn-primary" disabled>
                                        Alocar
                                    </button>

                                @else
                                    <a href=" {{ url('/alocar', $results->id_maqui) }}" >
                                        <button class="btn btn-primary">
                                            Alocar
                                        </button>
                                    </a>

                                @endif

                            </div>

                        </div>
                    </div>
                
                    @if($nums %3 == 0)
                    <div class="break"></div><br>
                    @endif
                    <?php $nuns++; ?>
            @endforeach
        </div>
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





