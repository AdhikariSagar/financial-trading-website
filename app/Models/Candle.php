<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candle extends Model
{
    use HasFactory;
    protected $fillable = [
        'symbol',
        'dateTime',
        'startPrice',
        'highestPrice',
        'lowestPrice',
        'endPrice',
        'volume',
        'source',
        'candleType',
        'currency',
    ];
    public function metadata()
    {
        return $this->belongsTo(Metadata::class, 'symbol', 'symbol');
    }

}
