<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;
use App\Services\Marvel\CharactersService;

class CharactersServiceTest extends TestCase
{
    /** @test */
    public function can_fetch_characters_from_marvel_api()
    {
        $service = new CharactersService();
        $result = $service->list();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(20, $result);
    }

    /** @test */
    public function can_fetch_a_single_character_from_marvel_api()
    {
        $characterId = 1011334;
        
        $service = new CharactersService();
        $result = $service->findBy($characterId);

        $this->assertIsArray($result);
        $this->assertEquals($result['id'], $characterId);
        $this->assertEquals($result['name'], '3-D Man');
    }
}
