<?php

namespace DataStructures;

class Stack
{
    private array $items = [];

    public function push(mixed $item): void
    {
        $this->items[] = $item;
    }

    public function pop(): mixed
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException("Cannot pop from an empty stack.");
        }
        return array_pop($this->items);
    }

    public function peek(): mixed
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException("Cannot peek an empty stack.");
        }
        return end($this->items);
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function size(): int
    {
        return count($this->items);
    }

    public function clear(): void
    {
        $this->items = [];
    }

    public function toArray(): array
    {
        return $this->items;
    }
}
