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
          <div class="col-md-12 text-center mb-2">
            <h4>Solicitar</h4>
          </div>
          <div class="col-md-12" >
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary w-100 mb-3" data-toggle="modal" data-target="#modalServices">
                Solicitar Acesso
              </button>
          </div>

          <div class="col-md-12" >
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#modalCracha">
                Solicitar novo Crachá
              </button>
          </div>
   
        </div>

    </div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="modalServices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal serviços</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Por favor, verifique todos os campos do formulário!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{route('view_pdf')}}" method="post">
                @csrf
                @include('form-services.form-for-services')
            </form>

        </div>
        
      </div>
    </div>
  </div>

   <!-- Modal -->
   <div class="modal fade" id="modalCracha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal crachá</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('view_pdf')}}" method="post">
                @csrf
                @include('form-services.form-for-cracha')
            </form>
        </div>
        
      </div>
    </div>
  </div>



@endsection
