<?php

namespace App\Services\Marvel;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class CreatorsService extends MarvelService
{
    public function list(array $params = []) : Collection
    {
        try {
            $query = array_merge($params, $this->apiAuth());
            $response = Http::get($this->url('/v1/public/creators'), $query);
            
            return collect($response->json()['data']['results']);
        } catch (Throwable $e) {
            throw $e;
        }
    }

    public function findBy(int $id) : array
    {
        try {
            $response = Http::get($this->url("/v1/public/creators/$id"), $this->apiAuth());

            return $response->json()['data']['results'][0];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
