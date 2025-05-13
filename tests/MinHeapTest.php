<?php

use PHPUnit\Framework\TestCase;
use App\MinHeap;

class MinHeapTest extends TestCase
{
    public function testInsertAndPeek(): void
    {
        $heap = new MinHeap();
        $heap->insert(20);
        $heap->insert(5);
        $heap->insert(15);

        $this->assertSame(5, $heap->peek());
    }

    public function testExtractMin(): void
    {
        $heap = new MinHeap();
        $heap->insert(10);
        $heap->insert(4);
        $heap->insert(7);

        $this->assertSame(4, $heap->extractMin());
        $this->assertSame(7, $heap->extractMin());
        $this->assertSame(10, $heap->extractMin());
    }

    public function testIsEmptyAndSize(): void
    {
        $heap = new MinHeap();
        $this->assertTrue($heap->isEmpty());
        $heap->insert(1);
        $this->assertFalse($heap->isEmpty());
        $this->assertEquals(1, $heap->size());
    }

    public function testExtractMinEmptyThrows(): void
    {
        $this->expectException(UnderflowException::class);
        $heap = new MinHeap();
        $heap->extractMin();
    }

    public function testPeekEmptyThrows(): void
    {
        $this->expectException(UnderflowException::class);
        $heap = new MinHeap();
        $heap->peek();
    }
}
