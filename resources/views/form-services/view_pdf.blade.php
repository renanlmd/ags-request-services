<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitação de serviço</title>
    <link href="{{ public_path('css/style-pdf.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<nav>
    <div class="img-nav">
        <img src="{{ public_path('/img/logo-amapa-garden.png') }}" alt="" class="img-logo">
    </div>
    <div class="title-nav">
        <h3>Solicitação de acesso e serviços</h3>
    </div>
</nav>
<main>
    <div class="infor-funcionario">
        <div class="title-funcionario">
            <h3>Informações do Funcionário</h3>
        </div>
        <div class="content-funcionario">
            <div class="nome">
                <span><strong>Nome funcionario:</strong> {{ ucwords($request->nome) }}</span>
            </div>
            <div class="documentos">
                <div class="data_nasc">
                    <p class="role"><strong>Data nascimento:</strong></p>
                    <p class="value">{{ $request->dataNascimento}}</p>
                </div>
                <div class="cpf">
                    <p class="role"><strong>CPF:</strong></p>
                    <p class="value">{{ $request->cpfFuncionario}}</p>
                </div>
                <div class="rg">
                    <p class="role"><strong>RG:</strong></p>
                    <p class="value">{{ $request->rgFuncionario}}</p>
                </div>
                <div class="telefone">
                    <p class="role"><strong>Telefone:</strong></p>
                    <p class="value">{{ $request->telefoneFuncionario}}</p>
                </div>
            </div>
            <div class="email_loja">
                <div class="infor-email">
                    <p class="role"><strong>E-mail:</strong></p>
                    <p class="value">{{ $request->email}}</p>
                </div>
                <div class="infor-loja">
                    <p class="role"><strong>Loja:</strong></p>
                    <p class="value">{{ $request->lojaFuncionario}}</p>
                </div>
                
            </div>
            <div class="infor-cargo">
                <div class="funcao">
                    <p class="role"><strong>Função do Funcionário:</strong></p>
                    <p class="value">{{ ucwords($request->funcao)}}</p>
                </div>
                <div class="gerente">
                    <p class="role"><strong>Gerente Responsável:</strong></p>
                    <p class="value">{{ ucwords($request->gerenteResponsavel)}}</p>
                </div>
            </div>

        </div>
    </div>

    <div class="infor-servico">
        <div class="title-servico">
            <h3>Detalhes Sobre Serviço</h3>
        </div> 
        <div class="content-servico">
            <div class="tipo-servico">
                <p><strong>Autorização para serviço de: </strong>{{ $request->tipo_servico}}</p>
            </div>
            <div class="tipo-execucao-servico">
                <p><strong>Haverá serviço de corte e/ou solda quente? </strong> {{ $request->modo_servico }}</p>
            </div>
            <div class="data-hora">
                <div class="index">
                    <h4>Data e hora da realização do serviço</h4>
                </div>
                <div class="datas">
                    <p class="data-inicio"><strong>Data Inicio: </strong>{{ $request->data_inicio }}</p>

                    <p class="data-termino"><strong>Data Término: </strong>{{ $request->data_terminio }}</p>
                </div>
                <div class="horarios">   
                    <p class="hora-inicio"><strong>Hora de Inicio: </strong>{{ $request->hora_inicio }}h</p>

                    <p class="hora-termino"><strong>Hora de Término: </strong>{{ $request->hora_terminio }}h</p>
                </div>
            </div>
            <div class="detalhes-servico">
                <p><strong>Observações (detalhes do serviço a ser executado):</strong></p>
                <p>{{ ucwords($request->detalhes_servico) }}</p>
            </div>
            
        </div>
    </div>
    
</main>
<footer>
    <div class="opcoes-autorizado">
        <div class="part1">
            <span><strong>Administração:</strong></span>
        </div>
        <div class="part2">
            <div class="quadrado"></div>
            <p>Autorizado</p>
        </div>
        <div class="part3">
            <div class="quadrado"></div>
            <p>Não Autorizado</p>
        </div>
    </div>
    <div class="assinaturas">
        <div class="assinatura1">
            <hr>
            <span>Assinatura do Gerente</span>
        </div>
        <div class="assinatura2">
            <hr>
            <span>Assinatura do Lojista</span>
        </div>
    </div>
    
</footer>
</body>
</html>