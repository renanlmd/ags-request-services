<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use PDF;
use Session;
use Illuminate\Support\Facades\Validator;

class SolicitacaoServicosController extends Controller
{

    public function formFuncionario(Request $request)
    {
        $services = Service::all();
        return view('form-services.form-funcionario', compact('services', 'request'));
    }

    public function viewPDF(Request $request)
    {
        if($request->tipo_solicitacao == 'acesso'){
            $request['cpfFuncionario'] = str_replace( array( '\'', '"', ',' , ';', '<', '>', '.', '-' ), '', $request->cpfFuncionario);
            if($request['tipo_servico'] == 'Escolha'){
                $request['tipo_servico'] = null;
            }
            
            $validator = Validator::make($request->all(), [
                'nome_loja' => 'required',
                'numero_loja_for_acesso' => 'required|numeric',
                'nome_lojista' => 'required',
                'email_lojista' => 'required|email',
                'tipo_servico' => 'required',
                'modo_servico' => 'required',
                'data_inicio' => 'required',
                'data_terminio' => 'required',
                'hora_inicio' => 'required',
                'hora_terminio' => 'required',
                'detalhes_servico' => 'required',
                'pessoas' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()
                            ->back()
                            ->with('error_acesso', 'campos invalidos')
                            ->withErrors($validator)
                            ->withInput();
            }else{
                Session::put([
                    'nome_loja' => $request->nome_loja,
                    'numero_loja_for_acesso' => $request->numero_loja_for_acesso,
                    'nome_lojista' => $request->nome_lojista,
                    'email_lojista' => $request->email_lojista,
                    'tipo_servico' => $request->tipo_servico,
                    'modo_servico' => $request->modo_servico,
                    'data_inicio' => $request->data_inicio,
                    'data_terminio' => $request->data_terminio,
                    'hora_inicio' => $request->hora_inicio,
                    'hora_terminio' => $request->hora_terminio,
                    'detalhes_servico' => $request->detalhes_servico,
                    'pessoas' => $request->pessoas,
                    'tipo_solicitacao' => $request->tipo_solicitacao
                    ]);
                
                return redirect()->route('teste');

            }     
        }
        elseif($request->tipo_solicitacao == 'cracha'){
            
            $request['cpfFuncionario'] = str_replace( array( '\'', '"', ',' , ';', '<', '>', '.', '-' ), '', $request->cpfFuncionario);
            
            $validator = Validator::make($request->all(), [
                'nome' => 'required',
                'dataNascimento' => 'required',
                'cpfFuncionario' => 'required|cpf',
                'rgFuncionario' => 'required',
                'telefoneFuncionario' => 'required',
                'email' => 'required|email',
                'lojaFuncionario' => 'required',
                'numero_loja_for_cracha' => 'required|numeric',
                'funcao' => 'required',
                'gerenteResponsavel' => 'required',
            ]);
           
            if ($validator->fails()) {
                return redirect()
                            ->back()
                            ->with('error_cracha', 'campos invalidos')
                            ->withErrors($validator)
                            ->withInput();
            }else{
                Session::put([
                    'nome' => $request->nome,
                    'dataNascimento' => $request->dataNascimento,
                    'cpfFuncionario' => $request->cpfFuncionario,
                    'rgFuncionario' => $request->rgFuncionario,
                    'telefoneFuncionario' => $request->telefoneFuncionario,
                    'email' => $request->email,
                    'lojaFuncionario' => $request->lojaFuncionario,
                    'numero_loja_for_cracha' => $request->numero_loja_for_cracha,
                    'funcao' => $request->funcao,
                    'gerenteResponsavel' => $request->gerenteResponsavel,
                    'tipo_solicitacao' => $request->tipo_solicitacao

                    ]);
                
                return redirect()->route('teste');
            }   
        }            
    }

    public function teste()
    {
        return view('form-services.view-data');
       
    }

    public function generatePDF()
    {     
        if(session('tipo_solicitacao') == 'acesso'){
            $data = [
                'nome_loja' => session('nome_loja'),
                'numero_loja_for_acesso' => session('numero_loja_for_acesso'),
                'nome_lojista' => session('nome_lojista'),
                'email_lojista' => session('email_lojista'),
                'tipo_servico' => session('tipo_servico'),
                'modo_servico' => session('modo_servico'),
                'data_inicio' => session('data_inicio'),
                'data_terminio' => session('data_terminio'),
                'hora_inicio' => session('hora_inicio'),
                'hora_terminio' => session('hora_terminio'),
                'detalhes_servico' => session('detalhes_servico'),
                'pessoas' => session('pessoas'),
                'tipo_solicitacao' => session('tipo_solicitacao')

            ];
            $request = (object) $data;
            $pdf = PDF::loadView('form-services.view-pdf-acesso', compact('request'))->setPaper('a4');
            return $pdf->stream('solicitacao.pdf');
        }
        elseif(session('tipo_solicitacao') == 'cracha'){
            
            $data = [
                'nome' => session('nome'),
                'dataNascimento' => session('dataNascimento'),
                'cpfFuncionario' => session('cpfFuncionario'),
                'rgFuncionario' => session('rgFuncionario'),
                'telefoneFuncionario' => session('telefoneFuncionario'),
                'email' => session('email'),
                'lojaFuncionario' => session('lojaFuncionario'),
                'numero_loja_for_cracha' => session('numero_loja_for_cracha'),
                'funcao' => session('funcao'),
                'gerenteResponsavel' => session('gerenteResponsavel'),
                'tipo_solicitacao' => session('tipo_solicitacao')

            ];
            $request = (object) $data;
            $pdf = PDF::loadView('form-services.view-pdf-cracha', compact('request'))->setPaper('a4');
            return $pdf->stream('solicitacao.pdf');
        }
           
       

    }
}
