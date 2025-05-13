<?php

namespace App;

final class Searching
{
    /** Binary Search iterativo: devuelve índice o null */
    public static function binary(array $sorted, int $target): ?int
    {
        $low = 0;
        $high = count($sorted) - 1;
        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);
            if ($sorted[$mid] === $target) return $mid;
            $target < $sorted[$mid] ? $high = $mid - 1 : $low = $mid + 1;
        }
        return null;
    }
}
