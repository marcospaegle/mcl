<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;
use App\DTO\Factories\CreatorDataFactory;
use App\DTO\Creator;

class CreatorDataFactoryTest extends TestCase
{
    /** @test */
    public function can_create_creator_from_attributes_array()
    {
        $modified = new \DateTime('2019-12-11T17:10:07-0500');

        $attr = [
            'id' => 13970,
            'firstName' => '#O',
            'middleName' => '',
            'lastName' => '',
            'suffix' => '',
            'fullName' => '#O',
            'modified' => '2019-12-11T17:10:07-0500',
            'thumbnail' => [
                'path' => 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available',
                'extension' => 'jpg'
            ]
        ];

        $creator = CreatorDataFactory::fromAttributes($attr);
        
        $this->assertInstanceOf(Creator::class, $creator);
        $this->assertEquals($attr['id'], $creator->id);
        $this->assertEquals($attr['firstName'], $creator->firstName);
        $this->assertEquals($attr['fullName'], $creator->fullName);
        $this->assertEquals($modified->getTimestamp(), $creator->modified->getTimestamp());
    }

    /** @test */
    public function can_create_comics_from_array_collection()
    {
        $modified = new \DateTime('2019-12-11T17:10:07-0500');

        $collection = [
            [
                'id' => 13970,
                'firstName' => '#O',
                'middleName' => '',
                'lastName' => '',
                'suffix' => '',
                'fullName' => '#O',
                'modified' => '2019-12-11T17:10:07-0500',
                'thumbnail' => [
                    'path' => 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available',
                    'extension' => 'jpg'
                ]
            ],
            [
                'id' => 13970,
                'firstName' => '#O',
                'middleName' => '',
                'lastName' => '',
                'suffix' => '',
                'fullName' => '#O',
                'modified' => '2019-12-11T17:10:07-0500',
                'thumbnail' => [
                    'path' => 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available',
                    'extension' => 'jpg'
                ]
            ],
            [
                'id' => 13970,
                'firstName' => '#O',
                'middleName' => '',
                'lastName' => '',
                'suffix' => '',
                'fullName' => '#O',
                'modified' => '2019-12-11T17:10:07-0500',
                'thumbnail' => [
                    'path' => 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available',
                    'extension' => 'jpg'
                ]
            ]
        ];

        $creators = CreatorDataFactory::fromCollection($collection);
        
        $this->assertInstanceOf(Collection::class, $creators);
        $this->assertEquals(3, $creators->count());

        $creator = $creators[0];
        
        $this->assertEquals($collection[0]['id'], $creator->id);
        $this->assertEquals($collection[0]['firstName'], $creator->firstName);
        $this->assertEquals($collection[0]['fullName'], $creator->fullName);
        $this->assertEquals($modified->getTimestamp(), $creator->modified->getTimestamp());
    }
}
