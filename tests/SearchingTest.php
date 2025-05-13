<?php

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use App\Searching;

#[CoversClass(Searching::class)]
class SearchingTest extends TestCase
{
    public function testBinaryFound(): void
    {
        $arr = [1, 3, 5, 7, 9];
        $this->assertSame(2, Searching::binary($arr, 5));
    }

    public function testBinaryNotFound(): void
    {
        $arr = [2, 4, 6, 8];
        $this->assertNull(Searching::binary($arr, 5));
    }
}
