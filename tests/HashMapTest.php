<?php

use PHPUnit\Framework\TestCase;
use App\HashMap;

class HashMapTest extends TestCase
{
    public function testSetAndGet(): void
    {
        $map = new HashMap();
        $map->set("name", "Mario");
        $map->set("age", 30);

        $this->assertSame("Mario", $map->get("name"));
        $this->assertSame(30, $map->get("age"));
    }

    public function testHas(): void
    {
        $map = new HashMap();
        $map->set("exists", true);
        $this->assertTrue($map->has("exists"));
        $this->assertFalse($map->has("missing"));
    }

    public function testDelete(): void
    {
        $map = new HashMap();
        $map->set("delete", "me");
        $this->assertTrue($map->delete("delete"));
        $this->assertFalse($map->has("delete"));
        $this->assertFalse($map->delete("not-there"));
    }

    public function testKeysAndValues(): void
    {
        $map = new HashMap();
        $map->set("a", 1);
        $map->set("b", 2);
        $map->set("c", 3);

        $this->assertEqualsCanonicalizing(["a", "b", "c"], $map->keys());
        $this->assertEqualsCanonicalizing([1, 2, 3], $map->values());
    }

    public function testGetInvalidKeyThrowsException(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $map = new HashMap();
        $map->get("missing");
    }
}
