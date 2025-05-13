<?php

use PHPUnit\Framework\TestCase;
use DataStructures\BinarySearchTree;

class BinarySearchTreeTest extends TestCase
{
    public function testInsertAndContains(): void
    {
        $bst = new BinarySearchTree();
        $bst->insert(10);
        $bst->insert(5);
        $bst->insert(15);

        $this->assertTrue($bst->contains(10));
        $this->assertTrue($bst->contains(5));
        $this->assertTrue($bst->contains(15));
        $this->assertFalse($bst->contains(8));
    }

    public function testInOrderTraversal(): void
    {
        $bst = new BinarySearchTree();
        $bst->insert(10);
        $bst->insert(5);
        $bst->insert(15);
        $bst->insert(3);
        $bst->insert(7);

        $this->assertSame([3, 5, 7, 10, 15], $bst->inOrderTraversal());
    }
}
