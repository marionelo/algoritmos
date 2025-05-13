<?php

namespace DataStructures;

class LinkedListNode
{
    public mixed $value;
    public ?LinkedListNode $next = null;

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }
}

class LinkedList
{
    private ?LinkedListNode $head = null;
    private int $size = 0;

    public function insertAtBeginning(mixed $value): void
    {
        $newNode = new LinkedListNode($value);
        $newNode->next = $this->head;
        $this->head = $newNode;
        $this->size++;
    }

    public function insertAtEnd(mixed $value): void
    {
        $newNode = new LinkedListNode($value);

        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
        $this->size++;
    }

    public function remove(mixed $value): bool
    {
        if ($this->head === null) return false;

        if ($this->head->value === $value) {
            $this->head = $this->head->next;
            $this->size--;
            return true;
        }

        $current = $this->head;
        while ($current->next !== null) {
            if ($current->next->value === $value) {
                $current->next = $current->next->next;
                $this->size--;
                return true;
            }
            $current = $current->next;
        }

        return false;
    }

    public function contains(mixed $value): bool
    {
        $current = $this->head;
        while ($current !== null) {
            if ($current->value === $value) {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    public function toArray(): array
    {
        $result = [];
        $current = $this->head;
        while ($current !== null) {
            $result[] = $current->value;
            $current = $current->next;
        }
        return $result;
    }

    public function size(): int
    {
        return $this->size;
    }

    public function isEmpty(): bool
    {
        return $this->size === 0;
    }
}
