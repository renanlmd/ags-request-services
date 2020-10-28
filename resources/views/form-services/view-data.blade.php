@extends('layout.app')

@section('title', 'teste')

@section('content')
    <div class="container">
        <div class="row">
            <button onclick="window.open('{{ route('generate_pdf') }}'); window.location.href='{{ route('form-servico') }}';" class="btn btn-primary">Visualizar Solicitação</button>
        </div>
    </div>
@endsection
