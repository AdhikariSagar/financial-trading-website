<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    use HasFactory;
    protected $fillable = [
        'symbol',
        'source',
        'ticker',
        'code',
        'type',
        'name',
        'exchange',
        'currency',
        'countryName',
        'countryIso',
        'sector',
        'industry',
        'description',
        'isin',
        'primaryTicker',
        'fullTimeEmployees',
        'updatedAt',
        'cusip',
        'logoURL',
        'cik',
        'employerIdNumber',
        'fiscalYearEnd',
        'ipoDate',
        'validUntil',
        'internationalDomestic',
        'gicSector',
        'gicGroup',
        'gicIndustry',
        'gicSubIndustry',
        'addressDetails',
        'phone',
        'webUrl',
        'category',
        'fundSummary',
        'fundFamily',
        'fundFiscalYearEnd',
        'exchangeMarket',
        'fundCategory',
        'fundStyle',
        'homeCategory',
        'isDelisted',
    ];
    protected $casts = [
        'addressDetails' => 'array',
        'officers' => 'array',
        'listings' => 'array',
        'marketCapitalization' => 'array',
        'technicals' => 'array',
        'exchangeTradedFundDetails' => 'array',
        'statistics' => 'array',
        'valuation' => 'array',
        'sharesStatistics' => 'array',
        'analystRatings' => 'array',
        'splitsDividends' => 'array',
        'dividends' => 'array',
        'splits' => 'array',
        'earnings' => 'array',
        'financials' => 'array',
        'insiderTransactions' => 'array',
        'holders' => 'array',
        'outstandingShares' => 'array',
    ];

    public function marketCap()
    {
        return $this->hasOne(MarketCapitalization::class);
    }

    public function indexComponents()
    {
        return $this->hasMany(IndexComponent::class);
    }

    public function statistics()
    {
        return $this->hasOne(Statistic::class);
    }

    public function exchange()
    {
        return $this->hasOne(Exchange::class, 'symbol', 'symbol');
    }
}
