<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;
use App\DTO\Factories\CharacterDataFactory;
use App\DTO\Character;

class CharacterDataFactoryTest extends TestCase
{
    /** @test */
    public function can_create_character_from_attributes_array()
    {
        $modified = new \DateTime('2014-04-29T14:18:17-0400');

        $attr = [
            'id' => 1011334,
            'name' => '3-D Man',
            'description' => '',
            'modified' => '2014-04-29T14:18:17-0400',
            'thumbnail' => [
                'path' => 'http://i.annihil.us/u/prod/marvel/i/mg/c/e0/535fecbbb9784',
                'extension' => 'jpg',
            ]
        ];

        $character = CharacterDataFactory::fromAttributes($attr);
        
        $this->assertInstanceOf(Character::class, $character);
        $this->assertEquals($attr['id'], $character->id);
        $this->assertEquals($attr['name'], $character->name);
        $this->assertEquals($attr['description'], $character->description);
        $this->assertEquals($modified->getTimestamp(), $character->modified->getTimestamp());
        $this->assertEquals(trim($attr['thumbnail']['path']) . '.' . trim($attr['thumbnail']['extension']), $character->thumbnail);
    }

    /** @test */
    public function can_create_characters_from_array_collection()
    {
        $modified = new \DateTime('2014-04-29T14:18:17-0400');

        $collection = [
            [
                'id' => 1011334,
                'name' => '3-D Man',
                'description' => '',
                'modified' => '2014-04-29T14:18:17-0400',
                'thumbnail' => [
                    'path' => 'http://i.annihil.us/u/prod/marvel/i/mg/c/e0/535fecbbb9784',
                    'extension' => 'jpg',
                ]
            ],
            [
                'id' => 1011334,
                'name' => '3-D Man',
                'description' => '',
                'modified' => '2014-04-29T14:18:17-0400',
                'thumbnail' => [
                    'path' => 'http://i.annihil.us/u/prod/marvel/i/mg/c/e0/535fecbbb9784',
                    'extension' => 'jpg',
                ]
            ],
            [
                'id' => 1011334,
                'name' => '3-D Man',
                'description' => '',
                'modified' => '2014-04-29T14:18:17-0400',
                'thumbnail' => [
                    'path' => 'http://i.annihil.us/u/prod/marvel/i/mg/c/e0/535fecbbb9784',
                    'extension' => 'jpg',
                ]
            ]
        ];

        $characters = CharacterDataFactory::fromCollection($collection);
        
        $this->assertInstanceOf(Collection::class, $characters);
        $this->assertEquals(3, $characters->count());

        $character = $characters[0];
        
        $this->assertEquals($collection[0]['id'], $character->id);
        $this->assertEquals($collection[0]['name'], $character->name);
        $this->assertEquals($collection[0]['description'], $character->description);
        $this->assertEquals($modified->getTimestamp(), $character->modified->getTimestamp());
        $this->assertEquals(trim($collection[0]['thumbnail']['path']) . '.' . trim($collection[0]['thumbnail']['extension']), $character->thumbnail);
    }
}
