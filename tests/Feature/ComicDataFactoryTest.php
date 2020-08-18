<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;
use App\DTO\Factories\ComicDataFactory;
use App\DTO\Comic;

class ComicDataFactoryTest extends TestCase
{
    /** @test */
    public function can_create_comic_from_attributes_array()
    {
        $modified = new \DateTime('2019-11-07T08:46:15-0500');

        $attr = [
            'id' => 82967,
            'digitalId' => 0,
            'title' => 'Marvel Previews (2017)',
            'issueNumber' => 0,
            'variantDescription' => '',
            'description' => null,
            'modified' => '2019-11-07T08:46:15-0500',
            'isbn' => '',
            'upc' => '75960608839302811',
            'diamondCode' => '',
            'ean' => '',
            'issn' => '',
            'format' => '',
            'pageCount' => 112,
            'resourceURI' => 'http://gateway.marvel.com/v1/public/comics/82967',
        ];

        $comic = ComicDataFactory::fromAttributes($attr);
        
        $this->assertInstanceOf(Comic::class, $comic);
        $this->assertEquals($attr['id'], $comic->id);
        $this->assertEquals($attr['digitalId'], $comic->digitalId);
        $this->assertEquals($attr['title'], $comic->title);
        $this->assertEquals($modified->getTimestamp(), $comic->modified->getTimestamp());
    }

    /** @test */
    public function can_create_comics_from_array_collection()
    {
        $modified = new \DateTime('2019-11-07T08:46:15-0500');

        $collection = [
            [
                'id' => 82967,
                'digitalId' => 0,
                'title' => 'Marvel Previews (2017)',
                'issueNumber' => 0,
                'variantDescription' => '',
                'description' => null,
                'modified' => '2019-11-07T08:46:15-0500',
                'isbn' => '',
                'upc' => '75960608839302811',
                'diamondCode' => '',
                'ean' => '',
                'issn' => '',
                'format' => '',
                'pageCount' => 112,
                'resourceURI' => 'http://gateway.marvel.com/v1/public/comics/82967',
            ],
            [
                'id' => 82967,
                'digitalId' => 0,
                'title' => 'Marvel Previews (2017)',
                'issueNumber' => 0,
                'variantDescription' => '',
                'description' => null,
                'modified' => '2019-11-07T08:46:15-0500',
                'isbn' => '',
                'upc' => '75960608839302811',
                'diamondCode' => '',
                'ean' => '',
                'issn' => '',
                'format' => '',
                'pageCount' => 112,
                'resourceURI' => 'http://gateway.marvel.com/v1/public/comics/82967',
            ],
            [
                'id' => 82967,
                'digitalId' => 0,
                'title' => 'Marvel Previews (2017)',
                'issueNumber' => 0,
                'variantDescription' => '',
                'description' => null,
                'modified' => '2019-11-07T08:46:15-0500',
                'isbn' => '',
                'upc' => '75960608839302811',
                'diamondCode' => '',
                'ean' => '',
                'issn' => '',
                'format' => '',
                'pageCount' => 112,
                'resourceURI' => 'http://gateway.marvel.com/v1/public/comics/82967',
            ]
        ];

        $characters = ComicDataFactory::fromCollection($collection);
        
        $this->assertInstanceOf(Collection::class, $characters);
        $this->assertEquals(3, $characters->count());

        $comic = $characters[0];
        
        $this->assertEquals($collection[0]['id'], $comic->id);
        $this->assertEquals($collection[0]['digitalId'], $comic->digitalId);
        $this->assertEquals($collection[0]['title'], $comic->title);
        $this->assertEquals($modified->getTimestamp(), $comic->modified->getTimestamp());
    }
}
