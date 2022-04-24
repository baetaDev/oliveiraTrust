@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulário</div>
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
                    <form method="post" action="{{ route('form') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">MOEDA DE ORIGEM:</label>
                            <input class="form-control" type="text" placeholder="BRL" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">MOEDA DE DESTINO:</label>
                            <select name="moedaDestino" class="form-control">
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">VALOR PARA CONVERSÃO:</label>
                            <input id="dinheiro" name="vlrConversao" maxlength=9 type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">FORMA DE PAGAMENTO:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formaPagementoRadios" id="exampleRadios1" value="cartao" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    CARTÃO
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formaPagementoRadios" id="exampleRadios2" value="boleto">
                                <label class="form-check-label" for="exampleRadios2">
                                    BOLETO
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12" style="text-align: right;">
                            <a href="/historico" class="btn btn-warning">HISTÓRICO</a>
                            <button type="submit" class="btn btn-primary">ENVIAR</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





