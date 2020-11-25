<input type="hidden" name="tipo_solicitacao" value="cracha">

<h3>Dados do Funcionário</h3>
<hr>
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
    <div class="form-group col-md-4">
        <label for="cpf">E-mail:</label>
        <input type="text" name="email" class="form-control {{ $errors->has('email') == true ? 'is-invalid' : ''}}" placeholder="E-mail" value="{{ old('email') }}" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="">Nome da Loja:</label>
        <input type="text" name="lojaFuncionario" class="form-control {{ $errors->has('lojaFuncionario') == true ? 'is-invalid' : ''}}" placeholder="Loja" value="{{ old('lojaFuncionario') }}">
        @if ($errors->has('lojaFuncionario'))
            <div class="invalid-feedback">
                {{ $errors->first('lojaFuncionario') }}
            </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="">Numero da Loja:</label>
        <input type="number" name="numero_loja" class="form-control {{ $errors->has('numero_loja') == true ? 'is-invalid' : ''}}" placeholder="Loja" value="{{ old('numero_loja') }}">
        @if ($errors->has('numero_loja'))
            <div class="invalid-feedback">
                {{ $errors->first('numero_loja') }}
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
                              
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
        
