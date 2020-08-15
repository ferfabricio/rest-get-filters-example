<?php

namespace Tests\Feature;

use App\Foo;
use Tests\TestCase;

class WithComparisionTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        factory(Foo::class)->create([
            'size' => 10
        ]);
        factory(Foo::class)->create([
            'size' => 20
        ]);
        factory(Foo::class)->create([
            'size' => 30
        ]);
    }

    /**
     * @dataProvider comparisionScenarios
     */
    public function testWithComparisions($comparision, $value, $quantity)
    {
        $query = http_build_query([
            'filters' => [
                "size_{$comparision}" => $value
            ]
        ]);
        $response = $this->get("/api/foo?{$query}");
        $response->assertOk();
        $response->assertJsonCount($quantity);
    }

    /**
     * @return array
     */
    public function comparisionScenarios(): array
    {
        return [
            ['gte', 10, 3],
            ['gte', 20, 2],
            ['gte', 21, 1],
            ['gte', 30, 1],
            ['gte', 50, 0],
            ['lte', 10, 1],
            ['lte', 20, 2],
            ['lte', 21, 2],
            ['lte', 30, 3],
            ['lte', 9, 0],
            ['lt', 31, 3],
            ['lt', 30, 2],
            ['lt', 21, 2],
            ['lt', 20, 1],
            ['lt', 19, 1],
            ['lt', 9, 0],
            ['gt', 0, 3],
            ['gt', 10, 2],
            ['gt', 20, 1],
            ['gt', 30, 0],
        ];
    }
}
