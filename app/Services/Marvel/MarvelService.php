<?php

namespace App\Services\Marvel;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\DTO\Character;

abstract class MarvelService
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

    protected function hash() : string
    {
        return md5($this->ts . $this->priKey . $this->pubKey);
    }

    protected function apiAuth() : array
    {
        return [
            'apikey' => $this->pubKey,
            'ts' => $this->ts,
            'hash' => $this->hash(),
        ];
    }

    protected function url(string $uri) : string
    {
        return $this->baseUrl . $uri;
    }

    public abstract function list(array $params = []) : Collection;
    public abstract function findBy(int $id) : array;
}
