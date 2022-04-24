<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\cotacao;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    const BASE_URL_API = 'https://economia.awesomeapi.com.br/json/last/';
    const MOEDA_ORIGEM = "BRL";

    public function formCotacao(Request $request)
    {
        $moedaDestino = $request->get("moedaDestino");
        $valorConversao = $request->get("vlrConversao");
        $formaDePagamento = $request->get("formaPagementoRadios");

        $request->validate([
            'vlrConversao' => 'required',            
        ]);
        
        $api = self::consultarCotacao($moedaDestino);
        $key = self::MOEDA_ORIGEM.$moedaDestino;

        $taxaDePagamento = $this->regraDePagamento($formaDePagamento, $valorConversao);
        $taxaDeConversao = $this->regraDeTaxa($valorConversao);
        $valorFinalDescontandoTaxas = $valorConversao - ($taxaDePagamento + $taxaDeConversao);
        $valorMoedaDestino = 1/$api[$key]['bid'];
        $valorCOmprado = $valorFinalDescontandoTaxas/$valorMoedaDestino;
        $userId = Auth::user()->id;

        $cotacao = cotacao::create([
            "user_id" => $userId,
            "moeda_de_origem" => $api[$key]['code'],
            "moeda_de_destino" => $api[$key]['codein'],
            "valor_para_conversão" => $valorConversao,
            "forma_de_pagamento" => $formaDePagamento,
            "valor_da_Moeda_de_destino" => $valorMoedaDestino,
            "valor_comprado_em_Moeda_de_destino" =>$valorCOmprado,
            "taxa_de_pagamento" => $taxaDePagamento,
            "taxa_de_conversão" => $taxaDeConversao,
            "valor_descontando_taxas" =>  $valorFinalDescontandoTaxas
        ]);

        $cotacao->save();
         
        return redirect('/historico')->with('success', 'Vaga adicionada');
    }

    public function consultarCotacao($pais){
        $endpoint = Http::get(self::BASE_URL_API.self::MOEDA_ORIGEM."-".$pais);

        if($endpoint->status() == 200) {
            return json_decode($endpoint,true);
        }else{
            return response()->json([
              "message" => "ERRO AO BUSCAR DADOS"
            ], 404);
        }
    }

    public function regraDeCompra($valor){
        if($valor >= 1000 && $valor <= 100000){
            return true;
        }else{
            return false;
        }
    }
    
    public function regraDePagamento ($formaDePagamento, $valor){
        switch ($formaDePagamento) {
            //boleto
            case 'boleto':
                $total = $valor * 0.0145;
                break;
            //cartao    
            case 'cartao':
                $total = $valor * 0.0763;
                break;
            default:
                $total = "forma de pagamento invalida";
        }

        return $total;
    }

    public function regraDeTaxa($valorFinal){
        if($valorFinal <= 3000){
            $valorReajustado = $valorFinal * 0.02;
        }else{
            $valorReajustado = $valorFinal * 0.01;
        }

        return $valorReajustado;
    }


}
