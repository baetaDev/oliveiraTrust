@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Histórico</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                                  
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                            <th>Moeda de origem</th>
                            <th>Moeda de destino</th>
                            <th>Conversão</th>
                            <th>Forma de pagamento</th>
                            <th>Moeda de destino</th>
                            <th>Moeda de destino comprada</th>
                            <th>Taxa de pagamento</th>
                            <th>Taxa de conversão</th>
                            <th>Valor descontando taxas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($historico as $historicos) 
                            <tr>
                            <td>{{$historicos->moeda_de_origem}}</td>
                            <td>{{$historicos->moeda_de_destino}}</td>
                            <td>{{number_format($historicos->valor_para_conversão,2,",",".")}}</td>
                            <td>{{$historicos->forma_de_pagamento}}</td>
                            <td>{{number_format($historicos->valor_da_Moeda_de_destino,2,",",".")}}</td>
                            <td>{{number_format($historicos->valor_comprado_em_Moeda_de_destino,2,",",".")}}</td>
                            <td>{{number_format($historicos->taxa_de_pagamento,2,",",".")}}</td>
                            <td>{{number_format($historicos->taxa_de_conversão,2,",",".")}}</td>
                            <td>{{number_format($historicos->valor_descontando_taxas,2,",",".")}}</td>
                            <td>
                            </td>
                            </tr>
                            <tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12" style="text-align: right;">
                    <a href="/home" class="btn btn-warning">VOLTAR</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





