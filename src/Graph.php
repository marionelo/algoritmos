<?php

namespace App;

use SplPriorityQueue;

final class Graph
{
    /** Breadth-First Search: devuelve orden de visita */
    public static function bfs(array $g, string $start): array
    {
        $queue = [$start];
        $seen  = [$start => true];
        $order = [];
        while ($queue) {
            $v = array_shift($queue);
            $order[] = $v;
            foreach ($g[$v] ?? [] as $nbr) {
                if (!isset($seen[$nbr])) {
                    $seen[$nbr] = true;
                    $queue[] = $nbr;
                }
            }
        }
        return $order;
    }

    /** Dijkstra: devuelve distancias mínimas desde $src */
    public static function dijkstra(array $g, string $src): array
    {
        $dist = array_fill_keys(array_keys($g), INF);
        $dist[$src] = 0;

        $pq = new class extends SplPriorityQueue {
            public function compare($p1, $p2)
            {
                return $p2 <=> $p1;
            }
        };
        $pq->insert($src, 0);

        while (!$pq->isEmpty()) {
            $u = $pq->extract();
            foreach ($g[$u] as $v => $w) {
                $alt = $dist[$u] + $w;
                if ($alt < $dist[$v]) {
                    $dist[$v] = $alt;
                    $pq->insert($v, -$alt);
                }
            }
        }
        return $dist;
    }

    /** Kruskal: Árbol de Expansión Mínima → lista de aristas */
    public static function kruskal(array $edges): array
    {
        usort($edges, fn($a, $b) => $a[2] <=> $b[2]);
        $vList = array_unique(array_merge(...array_map(fn($e) => [$e[0], $e[1]], $edges)));

        // Unión-búsqueda
        $parent = $rank = [];
        foreach ($vList as $v) {
            $parent[$v] = $v;
            $rank[$v] = 0;
        }
        $find = function ($v) use (&$parent, &$find) {
            return $parent[$v] === $v ? $v : $parent[$v] = $find($parent[$v]);
        };
        $union = function ($a, $b) use (&$parent, &$rank, $find) {
            $ra = $find($a);
            $rb = $find($b);
            if ($ra === $rb) return;
            if ($rank[$ra] < $rank[$rb]) [$ra, $rb] = [$rb, $ra];
            $parent[$rb] = $ra;
            if ($rank[$ra] === $rank[$rb]) $rank[$ra]++;
        };

        $mst = [];
        foreach ($edges as [$u, $v, $w]) {
            if ($find($u) !== $find($v)) {
                $union($u, $v);
                $mst[] = [$u, $v, $w];
            }
        }
        return $mst;
    }

    /** Floyd-Warshall: matriz de distancias mínimas entre todos los pares */
    public static function floydWarshall(array $matrix): array
    {
        $n = count($matrix);
        for ($k = 0; $k < $n; $k++)
            for ($i = 0; $i < $n; $i++)
                for ($j = 0; $j < $n; $j++)
                    if ($matrix[$i][$k] + $matrix[$k][$j] < $matrix[$i][$j])
                        $matrix[$i][$j] = $matrix[$i][$k] + $matrix[$k][$j];
        return $matrix;
    }
}
