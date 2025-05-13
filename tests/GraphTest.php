<?php

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use App\Graph;

#[CoversClass(Graph::class)]
class GraphTest extends TestCase
{
    public function testBfs(): void
    {
        $g = [
            'A' => ['B', 'C'],
            'B' => ['A', 'D'],
            'C' => ['A', 'D'],
            'D' => ['B', 'C'],
        ];
        $this->assertSame(['A', 'B', 'C', 'D'], Graph::bfs($g, 'A'));
    }

    public function testDijkstra(): void
    {
        $g = [
            'A' => ['B' => 2, 'C' => 5],
            'B' => ['C' => 1],
            'C' => [],
        ];
        $expected = ['A' => 0, 'B' => 2, 'C' => 3];
        $this->assertSame($expected, Graph::dijkstra($g, 'A'));
    }

    public function testKruskal(): void
    {
        $edges = [
            ['A', 'B', 1],
            ['B', 'C', 2],
            ['A', 'C', 3]
        ];
        $mst = Graph::kruskal($edges);
        // El MST debe tener 2 aristas y coste 3
        $this->assertCount(2, $mst);
        $this->assertSame(3, array_sum(array_column($mst, 2)));
    }

    public function testFloydWarshall(): void
    {
        $INF = 1e9;
        $m = [
            [0, 3, $INF],
            [$INF, 0, 2],
            [5, $INF, 0]
        ];
        $expected = [
            [0, 3, 5],
            [7, 0, 2],
            [5, 8, 0]
        ];
        $this->assertSame($expected, Graph::floydWarshall($m));
    }
}