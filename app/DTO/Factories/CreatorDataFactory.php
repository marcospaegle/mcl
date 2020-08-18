<?php

namespace App\DTO\Factories;

use Illuminate\Support\Collection;
use App\DTO\Creator;

class CreatorDataFactory
{
    public static function fromAttributes(array $attributes) : Creator
    {
        try {
            return new Creator([
                'id' => $attributes['id'],
                'firstName' => $attributes['firstName'],
                'middleName' => $attributes['middleName'],
                'lastName' => $attributes['lastName'],
                'suffix' => $attributes['suffix'],
                'fullName' => $attributes['fullName'],
                'modified' => $attributes['modified'],
                'thumbnail' => $attributes['thumbnail']['path'] . '.' . $attributes['thumbnail']['extension'],
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
