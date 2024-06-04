<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;
    protected $fillable = [
        'symbol',
        'ticker',
        'code',
        'isin',
        'type',
        'wpkn',
        'name',
        'nameLong',
        'region',
        'country',
        'currency',
        'figi',
        'cik',
        'lei',
        'source',
        'operatingMIC',
        'codeExchange',
        'virtualExchange',
        'nameExchange',
        'isArtificialExchange',
        'segmentExchange',
        'segmentNameExchange',
    ];

}
