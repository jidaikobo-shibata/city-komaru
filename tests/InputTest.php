<?php

declare(strict_types=1);

use Kontiki\Input;
use PHPUnit\Framework\TestCase;

final class InputTest extends TestCase
{
    public function testDeleteNullByteRemovesNullByteInString(): void
    {
        $this->assertSame('abc', Input::deleteNullByte("a\0b\0c"));
    }

    public function testDeleteNullByteRemovesNullByteInArray(): void
    {
        $actual = Input::deleteNullByte([
            "a\0b",
            ['nested' => "x\0y"],
        ]);

        $this->assertSame([
            'ab',
            ['nested' => 'xy'],
        ], $actual);
    }

    public function testDeleteNullByteConvertsNullToEmptyString(): void
    {
        $this->assertSame('', Input::deleteNullByte(null));
    }
}
