<input type="hidden" name="tipo_solicitacao" value="acesso">

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#dados-funcionario" role="tab" aria-controls="home" aria-selected="true">Dados da Loja</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#solicitar-acesso" role="tab" aria-controls="profile" aria-selected="false">Autorização para serviços</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
        @csrf
        <div class="tab-pane fade show active" id="dados-funcionario" role="tabpanel" aria-labelledby="home-tab">
            <h3>Loja</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Nome da Loja:</label>
                    <input type="text" name="nome_loja" class="form-control {{ $errors->has('nome_loja') ? 'is-invalid' : '' }}" id="" placeholder="Nome" value="{{ old('nome_loja') }}">
                    @if ($errors->has('nome_loja'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome_loja') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="">Numero da Loja:</label>
                    <input type="number" name="numero_loja_for_acesso" class="form-control {{ $errors->has('numero_loja_for_acesso') ? 'is-invalid' : '' }}" id=""  placeholder="Numero" value="{{ old('numero_loja_for_acesso') }}">
                    @if ($errors->has('numero_loja_for_acesso'))
                        <div class="invalid-feedback">
                            {{ $errors->first('numero_loja_for_acesso') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Lojista/Representante legal da loja:</label>
                    <input type="text" name="nome_lojista" class="form-control {{ $errors->has('nome_lojista') ? 'is-invalid' : ''}}" value="{{ old('nome_lojista') }}" placeholder="Nome">
                    @if ($errors->has('nome_lojista'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome_lojista') }}
                        </div>
                    @endif
                    
                </div>
                <div class="form-group col-md-6">
                    <label for="">E-mail do Lojista:</label>
                    <input type="email" name="email_lojista" class="form-control {{ $errors->has('email_lojista') ? 'is-invalid' : '' }}" placeholder="E-mail" value="{{ old('email_lojista') }}">
                    @if ($errors->has('email_lojista'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email_lojista') }}
                        </div>
                    @endif
                </div>
                
            </div>
           
                    
        </div>
        <div class="tab-pane fade" id="solicitar-acesso" role="tabpanel" aria-labelledby="profile-tab">
            <h3>Autorização para serviços de:</h3>

            <div class="form-row">
                <div class="form-group col-md-7">
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

            <div class="form-fow mb-3">
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
            
            <div class="form-row">
                <div class="col-md-12">
                    <label for="">Informe a data de inicio e término do serviço:</label>
                </div>                
                <div class="form-group col-md-4">
                    <input type="text" name="data_inicio" data-mask="00/00/0000" value="{{ old('data_inicio') }}" class="form-control" placeholder="Início">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="data_terminio"  data-mask="00/00/0000" class="form-control" value="{{ old('data_terminio') }}" placeholder="Término">
                </div>
                <div class="col-md-3">
                    @if ($errors->has('data_inicio') OR $errors->has('data_terminio'))
                        
                        <p style="color: rgb(238, 32, 32); font-size: 13px; margin-top:16px;">Verifique os campos de data!</p>
                        
                    @endif      
                </div>
                              
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label for="">Informe o hórario de início e término</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="hora_inicio" data-mask="00:00" value="{{ old('hora_inicio') }}" class="form-control" placeholder="Início">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="hora_terminio" data-mask="00:00" value="{{ old('hora_terminio') }}" class="form-control" placeholder="Término">
                </div>
                <div class="col-md-3">
                    @if ($errors->has('hora_inicio') OR $errors->has('hora_terminio'))
                        
                        <p style="color: rgb(238, 32, 32); font-size: 13px; margin-top:16px;">Verifique os campos de hora!</p>
                        
                    @endif      
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="">Observações (detalhar o serviço a ser executado)</label>
                    <textarea name="detalhes_servico" class="form-control {{$errors->has('detalhes_servico') ? 'is-invalid' : '' }}" rows="5"> {{ old('detalhes_servico') }}</textarea>
                    @if ($errors->has('detalhes_servico'))
                        <div class="invalid-feedback">
                            {{ $errors->first('detalhes_servico') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="col-lg-12">
                    <label for="">Nome e CPF para Autorizados:</label>

                    <div id="inputFormRow">
                        <div class="form-row align-items-center">                            
                            <div class="col-sm-4 my-1">
                                <label class="sr-only">Nome</label>
                                <input type="text" name="pessoas[pessoa1][nome]" class="form-control" placeholder="Nome">
                            </div>
                            <div class="col-sm-4 my-1">
                                <label class="sr-only">Name</label>
                                <input type="text" name="pessoas[pessoa1][cpf]" class="form-control cpfs" placeholder="CPF">
                            </div>
                            <div class="input-group-append">                
                                <button id="addRow" type="button" class="btn btn-success">Novo</button>
                            </div>
                        </div>
                    </div>

                    <div id="newRow"></div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
