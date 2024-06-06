<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketCapitalization extends Model
{
    use HasFactory;
    public function metaData()
    {
        return $this->belongsTo(Metadata::class);
    }

    public function buckets()
    {
        return $this->hasMany(MarketCapitalizationBucket::class);
    }
}
