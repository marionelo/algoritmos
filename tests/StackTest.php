<?php

use PHPUnit\Framework\TestCase;
use App\Stack;

class StackTest extends TestCase
{
    public function testPushAndPop(): void
    {
        $stack = new Stack();
        $stack->push("first");
        $stack->push("second");

        $this->assertSame("second", $stack->pop());
        $this->assertSame("first", $stack->pop());
    }

    public function testPeek(): void
    {
        $stack = new Stack();
        $stack->push("element");

        $this->assertSame("element", $stack->peek());
        $this->assertFalse($stack->isEmpty());
    }

    public function testIsEmptyAndSize(): void
    {
        $stack = new Stack();
        $this->assertTrue($stack->isEmpty());
        $stack->push(10);
        $this->assertFalse($stack->isEmpty());
        $this->assertEquals(1, $stack->size());
    }

    public function testClear(): void
    {
        $stack = new Stack();
        $stack->push(1);
        $stack->push(2);
        $stack->clear();
        $this->assertTrue($stack->isEmpty());
    }

    public function testPopEmptyThrowsException(): void
    {
        $this->expectException(UnderflowException::class);
        $stack = new Stack();
        $stack->pop();
    }

    public function testPeekEmptyThrowsException(): void
    {
        $this->expectException(UnderflowException::class);
        $stack = new Stack();
        $stack->peek();
    }
}
