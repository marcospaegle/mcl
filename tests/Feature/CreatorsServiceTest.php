<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;
use App\Services\Marvel\CreatorsService;

class CreatorsServiceTest extends TestCase
{
    /** @test */
    public function can_fetch_creators_from_marvel_api()
    {
        $service = new CreatorsService();
        $result = $service->list();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(20, $result);
    }

    /** @test */
    public function can_fetch_a_single_creator_from_marvel_api()
    {
        $creatorId = 13970;
        
        $service = new CreatorsService();
        $result = $service->findBy($creatorId);

        $this->assertIsArray($result);
        $this->assertEquals($result['id'], $creatorId);
        $this->assertEquals($result['firstName'], '#O');
    }
}
