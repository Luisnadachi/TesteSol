<?php

namespace Tests;

class NumberRomanServiceTest extends TestCase
{
    /**
     * @dataProvider payloadProvider
     */
    public function test_sum_number_romans($payload, $expected)
    {
        $payload = [
            "text" => $payload
        ];

        $response = $this->post('/search', $payload);

        $expected = [
            "value" => $expected
        ];

        $response->seeJsonContains($expected);
    }

    public function payloadProvider(): array
    {
        return [
            ['AXX', 20],
            ['X', 10],
            ['AXXBLX', 60],
            ['ABMODASEXLL', 1000],
            ['AAAXXAMCAMVI', 1100],
            ['XXX', 30],
            ['IV', 4]
        ];
    }

}
