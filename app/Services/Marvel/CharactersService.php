<?php

namespace App\Services\Marvel;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class CharactersService
{
    private $ts;
    private $pubKey;
    private $priKey;
    private $baseUrl;

    function __construct()
    {
        $this->ts = (new \DateTime())->getTimestamp();
        $this->pubKey = config('app.marvel.pubKey');
        $this->priKey = config('app.marvel.priKey');
        $this->baseUrl = config('app.marvel.baseUrl');
    }

    private function hash() : string
    {
        return md5($this->ts . $this->priKey . $this->pubKey);
    }

    private function apiAuth() : array
    {
        return [
            'apikey' => $this->pubKey,
            'ts' => $this->ts,
            'hash' => $this->hash(),
        ];
    }

    public function list(array $params = []) : Collection
    {
        try {
            $query = array_merge($params, $this->apiAuth());
            $response = Http::get($this->baseUrl . '/v1/public/characters', $query);
            
            return collect($response->json()['data']['results']);
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
