@extends('layout.app')

@section('title', 'teste')

@section('content')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Funcionário</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Serviços</a>
    </li>
</ul>
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Por favor, verifique todos os campos do formulário!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<form action="{{route('view_pdf')}}" method="post">
<div class="tab-content" id="myTabContent">
        @csrf
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3>Dados do Funcionário</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Nome do funcionario:</label>
                    <input type="text" name="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" id="" placeholder="Nome" value="{{ old('nome') }}">
                    @if ($errors->has('nome'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="">Data de nascimento:</label>
                    <input type="text" name="dataNascimento" class="form-control {{ $errors->has('dataNascimento') ? 'is-invalid' : '' }}" id="" data-mask="00/00/0000" placeholder="Ex: 10/05/1997" value="{{ old('dataNascimento') }}">
                    @if ($errors->has('dataNascimento'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dataNascimento') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpfFuncionario" class="form-control {{ $errors->has('cpfFuncionario') ? 'is-invalid' : ''}}" value="{{ old('cpfFuncionario') }}" data-mask="000.000.000-00" placeholder="Ex: 000.000.000-00">
                    @if ($errors->has('cpfFuncionario'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cpfFuncionario') }}
                        </div>
                    @endif
                    
                </div>
                <div class="form-group col-md-4">
                    <label for="rgFuncionario">RG:</label>
                    <input type="number" name="rgFuncionario" class="form-control {{ $errors->has('rgFuncionario') ? 'is-invalid' : '' }}" placeholder="RG" value="{{ old('rgFuncionario') }}">
                    @if ($errors->has('rgFuncionario'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rgFuncionario') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label for="">Telefone:</label>
                    <input type="text" name="telefoneFuncionario" data-mask="(00) 000000000" placeholder="Telefone" class="form-control {{ $errors->has('telefoneFuncionario') ? 'is-invalid' : '' }}" value="{{ old('telefoneFuncionario') }}">
                    @if ($errors->has('telefoneFuncionario'))
                        <div class="invalid-feedback">
                            {{ $errors->first('telefoneFuncionario') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cpf">E-mail:</label>
                    <input type="text" name="email" class="form-control {{ $errors->has('email') == true ? 'is-invalid' : ''}}" placeholder="E-mail" value="{{ old('email') }}" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="">Nome da Loja:</label>
                    <input type="text" name="lojaFuncionario" class="form-control {{ $errors->has('lojaFuncionario') == true ? 'is-invalid' : ''}}" placeholder="Loja" value="{{ old('lojaFuncionario') }}">
                    @if ($errors->has('lojaFuncionario'))
                        <div class="invalid-feedback">
                            {{ $errors->first('lojaFuncionario') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Informe a função:</label>
                    <input type="text" name="funcao" class="form-control {{ $errors->has('funcao') == true ? 'is-invalid' : ''}}" placeholder="Função" value="{{ old('funcao') }}">
                    @if ($errors->has('funcao'))
                        <div class="invalid-feedback">
                            {{ $errors->first('funcao') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="">Nome do gerente responsável:</label>
                    <input type="text" name="gerenteResponsavel" class="form-control {{ $errors->has('gerenteResponsavel') == true ? 'is-invalid' : ''}}" placeholder="Gerente" value="{{ old('gerenteResponsavel') }}">
                    @if ($errors->has('gerenteResponsavel'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gerenteResponsavel') }}
                        </div>
                    @endif
                </div>
            </div>
                            
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <h3>Autorização para serviços de:</h3>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Escolha o tipo de serviço a ser executado</label>
                    
                    <select class="custom-select {{ $errors->has('tipo_servico') == true ? 'is-invalid' : ''}}" name="tipo_servico">
                        <option>Escolha</option>

                        @foreach ($services as $index => $item)

                            @if (old('tipo_servico') == $item->nome_servico)
                                <option value="{{ $item->nome_servico }}" selected>{{ $item->nome_servico }}</option>
                            @else 
                                <option value="{{ $item->nome_servico }}"> {{ $item->nome_servico }}</option>
                            @endif

                        @endforeach
                      
                    </select>
                    @if ($errors->has('tipo_servico'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tipo_servico') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-fow">
                <label for="">Haverá serviço de corte e/ou solda quente?</label>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sim" name="modo_servico" value="Sim" class="custom-control-input" @php if(old('modo_servico') == 'Sim') echo 'checked'  @endphp>
                    <label class="custom-control-label" for="sim">Sim</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="nao" name="modo_servico" value="Não" class="custom-control-input" @php if(old('modo_servico') == 'Não') echo 'checked'  @endphp>
                  <label class="custom-control-label" for="nao">Não</label>
                </div>
                   
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">Data de realização do serviço:</label>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="data_inicio" data-mask="00/00/0000" value="{{ old('data_inicio') }}" class="form-control" placeholder="Ex: 10/05/1997">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="data_terminio"  data-mask="00/00/0000" class="form-control" value="{{ old('data_terminio') }}" placeholder="Ex: 10/05/1997">
                </div>
                <div class="col-md-3">
                    @if ($errors->has('data_inicio') OR $errors->has('data_terminio'))
                        
                        <p style="color: rgb(238, 32, 32); font-size: 13px; margin-top:16px;">Verifique os campos de data!</p>
                        
                    @endif      
                </div>
                              
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">Horário de realização do serviço:</label>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="hora_inicio" data-mask="00:00" value="{{ old('hora_inicio') }}" class="form-control" placeholder="Ex: 09:00">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="hora_terminio" data-mask="00:00" value="{{ old('hora_terminio') }}" class="form-control" placeholder="Ex: 15:00">
                </div>
                <div class="col-md-3">
                    @if ($errors->has('hora_inicio') OR $errors->has('hora_terminio'))
                        
                        <p style="color: rgb(238, 32, 32); font-size: 13px; margin-top:16px;">Verifique os campos de hora!</p>
                        
                    @endif      
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Observações (detalhar o serviço a ser executado)</label>
                    <textarea name="detalhes_servico" class="form-control {{$errors->has('detalhes_servico') ? 'is-invalid' : '' }}" rows="5" hei> {{ old('detalhes_servico') }}</textarea>
                    @if ($errors->has('detalhes_servico'))
                        <div class="invalid-feedback">
                            {{ $errors->first('detalhes_servico') }}
                        </div>
                    @endif
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>

@endsection