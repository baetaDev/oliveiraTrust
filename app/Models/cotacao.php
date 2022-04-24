<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cotacao extends Model
{
    use HasFactory;

    protected $table = "cotacao";

    protected $fillable = [
        'id',
        'user_id',
        'moeda_de_origem',
        'moeda_de_destino',
        'valor_para_conversão',
        'forma_de_pagamento',
        'valor_da_Moeda_de_destino',
        'valor_comprado_em_Moeda_de_destino',
        'taxa_de_pagamento',
        'taxa_de_conversão',
        'valor_descontando_taxas',
        'updated_at',
        'created_at'            
    ];
}
