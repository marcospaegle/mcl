<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;
use App\Services\Marvel\ComicsService;

class ComicsServiceTest extends TestCase
{
    /** @test */
    public function can_fetch_comics_from_marvel_api()
    {
        $service = new ComicsService();
        $result = $service->list();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(20, $result);
    }

    /** @test */
    public function can_fetch_a_single_comic_from_marvel_api()
    {
        $comicId = 82967;
        
        $service = new ComicsService();
        $result = $service->findBy($comicId);

        $this->assertIsArray($result);
        $this->assertEquals($result['id'], $comicId);
        $this->assertEquals($result['title'], 'Marvel Previews (2017)');
    }
}
