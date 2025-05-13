<?php

use PHPUnit\Framework\TestCase;
use DataStructures\LinkedList;

class LinkedListTest extends TestCase
{
    public function testInsertAtBeginning(): void
    {
        $list = new LinkedList();
        $list->insertAtBeginning("C");
        $list->insertAtBeginning("B");
        $list->insertAtBeginning("A");
        $this->assertSame(["A", "B", "C"], $list->toArray());
    }

    public function testInsertAtEnd(): void
    {
        $list = new LinkedList();
        $list->insertAtEnd("A");
        $list->insertAtEnd("B");
        $list->insertAtEnd("C");
        $this->assertSame(["A", "B", "C"], $list->toArray());
    }

    public function testRemove(): void
    {
        $list = new LinkedList();
        $list->insertAtEnd("A");
        $list->insertAtEnd("B");
        $list->insertAtEnd("C");
        $this->assertTrue($list->remove("B"));
        $this->assertSame(["A", "C"], $list->toArray());
        $this->assertFalse($list->remove("X"));
    }

    public function testContains(): void
    {
        $list = new LinkedList();
        $list->insertAtEnd("A");
        $list->insertAtEnd("B");
        $this->assertTrue($list->contains("B"));
        $this->assertFalse($list->contains("Z"));
    }

    public function testSizeAndIsEmpty(): void
    {
        $list = new LinkedList();
        $this->assertTrue($list->isEmpty());
        $list->insertAtEnd("X");
        $this->assertEquals(1, $list->size());
        $this->assertFalse($list->isEmpty());
    }
}
