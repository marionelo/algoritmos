<?php

namespace App;

class Queue
{
    private array $items = [];

    public function enqueue(mixed $item): void
    {
        $this->items[] = $item;
    }

    public function dequeue(): mixed
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException("Cannot dequeue from an empty queue.");
        }
        return array_shift($this->items);
    }

    public function peek(): mixed
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException("Cannot peek an empty queue.");
        }
        return $this->items[0];
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
