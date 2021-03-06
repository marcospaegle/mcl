<?php

namespace App\DTO\Factories;

use Illuminate\Support\Collection;
use App\DTO\Character;

class CharacterDataFactory
{
    public static function fromAttributes(array $attributes) : Character
    {
        try {
            return new Character([
                'id' => $attributes['id'],
                'name' => $attributes['name'],
                'description' => $attributes['description'],
                'modified' => $attributes['modified'],
                'thumbnail' => trim($attributes['thumbnail']['path']) . '.' . trim($attributes['thumbnail']['extension']),
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
