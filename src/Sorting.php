<?php

namespace App;

final class Sorting
{
    /** Insertion Sort (in-place) */
    public static function insertion(array &$a): void
    {
        for ($i = 1, $n = count($a); $i < $n; $i++) {
            $key = $a[$i];
            for ($j = $i - 1; $j >= 0 && $a[$j] > $key; $j--) {
                $a[$j + 1] = $a[$j];
            }
            $a[$j + 1] = $key;
        }
    }

    /** Bubble Sort (in-place) */
    public static function bubble(array &$a): void
    {
        for ($n = count($a); $n > 1; $n--) {
            $swapped = false;
            for ($i = 1; $i < $n; $i++) {
                if ($a[$i - 1] > $a[$i]) {
                    [$a[$i - 1], $a[$i]] = [$a[$i], $a[$i - 1]];
                    $swapped = true;
                }
            }
            if (!$swapped) break;
        }
    }

    /** QuickSort (función pura: devuelve nuevo array ordenado) */
    public static function quick(array $a): array
    {
        // if (count($a) < 2) return $a;
        // $pivot = $a[array_key_first($a)];
        // $left = $right = [];
        // foreach (array_slice($a, 1) as $v) {
        //     ($v <= $pivot ? $left : $right)[] = $v;
        // }
        // return array_merge(self::quick($left), [$pivot], self::quick($right));
        return [];
    }
}
