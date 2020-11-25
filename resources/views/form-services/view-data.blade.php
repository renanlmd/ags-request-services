@extends('layout.app')

@section('title', 'teste')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto shadow mb-5 rounded card-content">
        <div class="row mb-3">
            <div class="col-md-6 mx-auto card-center text-center" >
              <img src="/img/logo-amapa-garden.png" alt="" class="img-logo">
            </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center mb-3">
              @if (session('tipo_solicitacao') == 'acesso')
                <h4>Tipo da Solicitação: Acesso e Serviços</h4>

              @else
                <h4>Tipo da Solicitação: Confecção de Crachá</h4>

              @endif
          </div>
          
          <div class="col-md-12" >
                <button onclick="window.open('{{ route('generate_pdf') }}'); window.location.href='{{ route('form-servico') }}';" class="btn btn-primary w-100">Visualizar Solicitação</button>
          </div>
   
        </div>

    </div>
</div>

@endsection
