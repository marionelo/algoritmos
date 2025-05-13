<?php

namespace DataStructures;

class BSTNode
{
    public mixed $value;
    public ?BSTNode $left = null;
    public ?BSTNode $right = null;

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }
}

class BinarySearchTree
{
    private ?BSTNode $root = null;

    public function insert(mixed $value): void
    {
        $this->root = $this->insertNode($this->root, $value);
    }

    private function insertNode(?BSTNode $node, mixed $value): BSTNode
    {
        if ($node === null) return new BSTNode($value);

        if ($value < $node->value) {
            $node->left = $this->insertNode($node->left, $value);
        } else {
            $node->right = $this->insertNode($node->right, $value);
        }

        return $node;
    }

    public function contains(mixed $value): bool
    {
        return $this->search($this->root, $value);
    }

    private function search(?BSTNode $node, mixed $value): bool
    {
        if ($node === null) return false;
        if ($node->value === $value) return true;

        return $value < $node->value
            ? $this->search($node->left, $value)
            : $this->search($node->right, $value);
    }

    public function inOrderTraversal(): array
    {
        $result = [];
        $this->inOrder($this->root, $result);
        return $result;
    }

    private function inOrder(?BSTNode $node, array &$result): void
    {
        if ($node !== null) {
            $this->inOrder($node->left, $result);
            $result[] = $node->value;
            $this->inOrder($node->right, $result);
        }
    }
}
