<?php

declare(strict_types=1);

use Kontiki\Util;
use PHPUnit\Framework\TestCase;

final class UtilTest extends TestCase
{
    public function testAddQueryStringsWithoutExistingQuery(): void
    {
        $actual = Util::addQueryStrings('/practice/', [
            ['a', '1'],
            ['b', '2'],
        ]);

        $this->assertSame('/practice/?a=1&amp;b=2', $actual);
    }

    public function testAddQueryStringsWithExistingQuery(): void
    {
        $actual = Util::addQueryStrings('/practice/?a=1', [
            ['b', '2'],
        ]);

        $this->assertSame('/practice/?a=1&amp;b=2', $actual);
    }

    public function testRemoveQueryStringsRemovesSpecifiedKeys(): void
    {
        $actual = Util::removeQueryStrings('/practice/?a=1&amp;b=2&amp;c=3', ['b']);
        $this->assertSame('/practice/?a=1&amp;c=3', $actual);
    }

    public function testTruncateCutsLongString(): void
    {
        $this->assertSame('abc...', Util::truncate('abcdef', 3));
    }
}
