<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use PDF;
use Session;

class SolicitacaoServicosController extends Controller
{
    public function formFuncionario(Request $request)
    {
        $services = Service::all();
        return view('form-services.form-funcionario', compact('services', 'request'));
    }

    
    public function viewPDF(Request $request)
    {
        $request['cpfFuncionario'] = str_replace( array( '\'', '"', ',' , ';', '<', '>', '.', '-' ), '', $request->cpfFuncionario);
        if($request['tipo_servico'] == 'Escolha'){
            $request['tipo_servico'] = null;
        }
        $validated = $request->validate([
            'cpfFuncionario' => 'required|cpf',
            'email' => 'required|email',
            'rgFuncionario' => 'required',
            'telefoneFuncionario' => 'required',
            'nome' => 'required',
            'dataNascimento' => 'required',
            'lojaFuncionario' => 'required',
            'funcao' => 'required',
            'gerenteResponsavel' => 'required',
            'tipo_servico' => 'required',
            'data_inicio' => 'required',
            'data_terminio' => 'required',
            'hora_inicio' => 'required',
            'hora_terminio' => 'required',
            'detalhes_servico' => 'required',
        ]);
        
        if($validated){
            Session::put([
                'nome' => $request->nome,
                'dataNascimento' => $request->dataNascimento,
                'cpfFuncionario' => $request->cpfFuncionario,
                'rgFuncionario' => $request->rgFuncionario,
                'telefoneFuncionario' => $request->telefoneFuncionario,
                'email' => $request->email,
                'lojaFuncionario' => $request->lojaFuncionario,
                'funcao' => $request->funcao,
                'gerenteResponsavel' => $request->gerenteResponsavel,
                'tipo_servico' => $request->tipo_servico,
                'data_inicio' => $request->data_inicio,
                'data_terminio' => $request->data_terminio,
                'hora_inicio' => $request->hora_inicio,
                'hora_terminio' => $request->hora_terminio,
                'detalhes_servico' => $request->detalhes_servico,
                'modo_servico' => $request->modo_servico
                ]);
            
            return redirect()->route('teste');
        }          
    }

    public function teste()
    {
        return view('form-services.view-data');
        
    }

    public function generatePDF()
    {
        $data = [
            'nome' => session('nome'),
            'dataNascimento' => session('dataNascimento'),
            'cpfFuncionario' => session('cpfFuncionario'),
            'rgFuncionario' => session('rgFuncionario'),
            'telefoneFuncionario' => session('telefoneFuncionario'),
            'email' => session('email'),
            'lojaFuncionario' => session('lojaFuncionario'),
            'funcao' => session('funcao'),
            'gerenteResponsavel' => session('gerenteResponsavel'),
            'tipo_servico' => session('tipo_servico'),
            'data_inicio' => session('data_inicio'),
            'data_terminio' => session('data_terminio'),
            'hora_inicio' => session('hora_inicio'),
            'hora_terminio' => session('hora_terminio'),
            'detalhes_servico' => session('detalhes_servico'),
            'modo_servico' => session('modo_servico')
        ];
        $request = (object) $data;        
        $pdf = PDF::loadView('form-services.view_pdf', compact('request'))->setPaper('a4');
        return $pdf->stream('solicitacao.pdf');

    }
}
