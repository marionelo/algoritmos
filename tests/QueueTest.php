<?php

use PHPUnit\Framework\TestCase;
use DataStructures\Queue;

class QueueTest extends TestCase
{
    public function testEnqueueAndDequeue(): void
    {
        $queue = new Queue();
        $queue->enqueue("first");
        $queue->enqueue("second");

        $this->assertSame("first", $queue->dequeue());
        $this->assertSame("second", $queue->dequeue());
    }

    public function testPeek(): void
    {
        $queue = new Queue();
        $queue->enqueue("element");

        $this->assertSame("element", $queue->peek());
        $this->assertFalse($queue->isEmpty());
    }

    public function testIsEmptyAndSize(): void
    {
        $queue = new Queue();
        $this->assertTrue($queue->isEmpty());
        $queue->enqueue(10);
        $this->assertFalse($queue->isEmpty());
        $this->assertEquals(1, $queue->size());
    }

    public function testClear(): void
    {
        $queue = new Queue();
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->clear();
        $this->assertTrue($queue->isEmpty());
    }

    public function testDequeueEmptyThrowsException(): void
    {
        $this->expectException(UnderflowException::class);
        $queue = new Queue();
        $queue->dequeue();
    }

    public function testPeekEmptyThrowsException(): void
    {
        $this->expectException(UnderflowException::class);
        $queue = new Queue();
        $queue->peek();
    }
}
