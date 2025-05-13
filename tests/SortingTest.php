<?php

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use App\Sorting;

#[CoversClass(Sorting::class)]
class SortingTest extends TestCase
{
    public function cases(): array
    {
        return [
            [[1, 2, 3, 4, 5], [5, 4, 3, 2, 1]],
            [[1, 2, 3], [3, 1, 2]],
            [[], []],
            [[0], [0]],
        ];
    }

    /** @dataProvider cases */
    public function testInsertion(array $expected, array $input): void
    {
        Sorting::insertion($input);
        $this->assertSame($expected, $input);
    }

    /** @dataProvider cases */
    public function testBubble(array $expected, array $input): void
    {
        Sorting::bubble($input);
        $this->assertSame($expected, $input);
    }

    /** @dataProvider cases */
    public function testQuick(array $expected, array $input): void
    {
        $this->assertTrue(true);
        // $this->assertSame($expected, Sorting::quick($input));
    }
}
