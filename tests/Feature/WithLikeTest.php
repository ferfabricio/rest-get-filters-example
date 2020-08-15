<?php

namespace Tests\Feature;

use App\Foo;
use Tests\TestCase;

class WithLikeTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        factory(Foo::class)->create([
            'name' => 'Fernando'
        ]);
        factory(Foo::class)->create([
            'name' => 'Fabricio'
        ]);
        factory(Foo::class)->create([
            'name' => 'Santos'
        ]);
    }

    public function testWithValuesStartOfTheName()
    {
        $query = http_build_query([
            'filters' => [
                'name' => 'Fab'
            ]
        ]);
        $response = $this->get("/api/foo?{$query}");
        $response->assertOk();
        $response->assertJsonCount(1);
    }
}
