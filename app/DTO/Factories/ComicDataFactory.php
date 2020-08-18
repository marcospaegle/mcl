<?php

namespace App\DTO\Factories;

use Illuminate\Support\Collection;
use App\DTO\Comic;

class ComicDataFactory
{
    public static function fromAttributes(array $attributes) : Comic
    {
        try {
            return new Comic([
                'id' => $attributes['id'],
                'digitalId' => $attributes['digitalId'],
                'title' => $attributes['title'],
                'issueNumber' => $attributes['issueNumber'],
                'variantDescription' => $attributes['variantDescription'],
                'description' => $attributes['description'],
                'modified' => $attributes['modified'],
                'isbn' => $attributes['isbn'],
                'upc' => $attributes['upc'],
                'diamondCode' => $attributes['diamondCode'],
                'ean' => $attributes['ean'],
                'issn' => $attributes['issn'],
                'format' => $attributes['format'],
                'pageCount' => $attributes['pageCount'],
                'resourceURI' => $attributes['resourceURI'],
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function fromCollection(array $collection) : Collection
    {
        try {
            $result = [];
            foreach ($collection as $attr) {
                $result[] = self::fromAttributes($attr);
            }
    
            return collect($result);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
