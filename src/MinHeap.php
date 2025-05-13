<?php

namespace App;

class MinHeap
{
    private array $heap = [];

    public function insert(mixed $value): void
    {
        $this->heap[] = $value;
        $this->heapifyUp(count($this->heap) - 1);
    }

    public function extractMin(): mixed
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException("Heap is empty.");
        }

        $min = $this->heap[0];
        $last = array_pop($this->heap);

        if (!empty($this->heap)) {
            $this->heap[0] = $last;
            $this->heapifyDown(0);
        }

        return $min;
    }

    public function peek(): mixed
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException("Heap is empty.");
        }
        return $this->heap[0];
    }

    public function isEmpty(): bool
    {
        return empty($this->heap);
    }

    public function size(): int
    {
        return count($this->heap);
    }

    private function heapifyUp(int $index): void
    {
        while ($index > 0) {
            $parentIndex = intdiv($index - 1, 2);
            if ($this->heap[$index] < $this->heap[$parentIndex]) {
                [$this->heap[$index], $this->heap[$parentIndex]] = [$this->heap[$parentIndex], $this->heap[$index]];
                $index = $parentIndex;
            } else {
                break;
            }
        }
    }

    private function heapifyDown(int $index): void
    {
        $lastIndex = count($this->heap) - 1;

        while (true) {
            $left = 2 * $index + 1;
            $right = 2 * $index + 2;
            $smallest = $index;

            if ($left <= $lastIndex && $this->heap[$left] < $this->heap[$smallest]) {
                $smallest = $left;
            }
            if ($right <= $lastIndex && $this->heap[$right] < $this->heap[$smallest]) {
                $smallest = $right;
            }
            if ($smallest !== $index) {
                [$this->heap[$index], $this->heap[$smallest]] = [$this->heap[$smallest], $this->heap[$index]];
                $index = $smallest;
            } else {
                break;
            }
        }
    }

    public function toArray(): array
    {
        return $this->heap;
    }
}
