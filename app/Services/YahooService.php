<?php

namespace App\Services;

use App\Models\MyEtf;
use Scheb\YahooFinanceApi\ApiClientFactory;

class YahooService
{
    protected $client;

    public function __construct()
    {
        $this->client = ApiClientFactory::createApiClient();
    }

    public function getQuoteCached(MyEtf $etf, $minutes = 30)
    {
        if ($etf->yahoo && $etf->yahoo_updated_at &&
            $etf->yahoo_updated_at->gt(now()->subMinutes($minutes))) {
            return json_decode($etf->yahoo, true);
        }

        // fetch fresh
        try {
            $quote = $this->client->getQuote('$etf->ticker');
            $data = [
                'name' => $quote->getLongName(),
                'price' => $quote->getRegularMarketPrice(),
                'change' => $quote->getRegularMarketChange(),
                'change_percent' => $quote->getRegularMarketChangePercent(),
            ];

            $etf->update([
                'yahoo' => json_encode($data),
                'yahoo_updated_at' => now(),
            ]);

            return $data;
        } catch (\Exception $e) {
            return json_decode($etf->yahoo ?? '{}', true);
        }
    }
}
