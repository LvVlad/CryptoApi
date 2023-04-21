<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;
use App\CryptoCurrency;

class CryptoApi
{
    private Client $client;
    private const API_KEY = '667a146a-cf3a-418f-8734-40835bc2a7fd';

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
    }

    public function getInfo()
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=10';
        $headers = [
            'Accepts' => 'application/json',
            'X-CMC_PRO_API_KEY' => self::API_KEY
        ];
        $response = $this->client->request('GET', $url, ['headers' => $headers]);
        return json_decode($response->getBody()->getContents());
    }

    public function displayInfo($currencyInfo)
    {
        foreach ($currencyInfo->data as $value)
        {
            $cryptoCoin = new CryptoCurrency
            (
                $value->name,
                $value->symbol,
                $value->quote->USD->price
            );

            echo $cryptoCoin->getName().' - '.$cryptoCoin->getSymbol().' - '
                .round($cryptoCoin->getPrice(), 4).' USD'.PHP_EOL;
        }
    }
}