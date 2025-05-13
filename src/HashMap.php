<?php

namespace App;

class HashMap
{
    private array $buckets;
    private int $size;

    public function __construct(int $size = 16)
    {
        $this->buckets = array_fill(0, $size, []);
        $this->size = $size;
    }

    private function getBucketIndex(string $key): int
    {
        return crc32($key) % $this->size;
    }

    public function set(string $key, mixed $value): void
    {
        $index = $this->getBucketIndex($key);
        foreach ($this->buckets[$index] as &$pair) {
            if ($pair['key'] === $key) {
                $pair['value'] = $value;
                return;
            }
        }
        $this->buckets[$index][] = ['key' => $key, 'value' => $value];
    }

    public function get(string $key): mixed
    {
        $index = $this->getBucketIndex($key);
        foreach ($this->buckets[$index] as $pair) {
            if ($pair['key'] === $key) {
                return $pair['value'];
            }
        }
        throw new \OutOfBoundsException("Key '{$key}' not found.");
    }

    public function has(string $key): bool
    {
        $index = $this->getBucketIndex($key);
        foreach ($this->buckets[$index] as $pair) {
            if ($pair['key'] === $key) {
                return true;
            }
        }
        return false;
    }

    public function delete(string $key): bool
    {
        $index = $this->getBucketIndex($key);
        foreach ($this->buckets[$index] as $i => $pair) {
            if ($pair['key'] === $key) {
                array_splice($this->buckets[$index], $i, 1);
                return true;
            }
        }
        return false;
    }

    public function keys(): array
    {
        $keys = [];
        foreach ($this->buckets as $bucket) {
            foreach ($bucket as $pair) {
                $keys[] = $pair['key'];
            }
        }
        return $keys;
    }

    public function values(): array
    {
        $values = [];
        foreach ($this->buckets as $bucket) {
            foreach ($bucket as $pair) {
                $values[] = $pair['value'];
            }
        }
        return $values;
    }
}
