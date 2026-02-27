<?php

declare(strict_types=1);

namespace Tests;

use Kontiki\Session;
use PHPUnit\Framework\TestCase;

final class SessionTest extends TestCase
{
    protected function setUp(): void
    {
        $_SESSION = [];
        Session::remove('test_realm');
    }

    public function testAddAndShowStoresValues(): void
    {
        Session::add('test_realm', 'key', 'first');
        Session::add('test_realm', 'key', 'second');

        $this->assertSame(['first', 'second'], Session::show('test_realm', 'key'));
    }

    public function testFetchDefaultsToOnceAndRemovesValues(): void
    {
        Session::add('test_realm', 'key', 'first');

        $fetched = Session::fetch('test_realm', 'key');
        $afterFetch = Session::show('test_realm', 'key');

        $this->assertSame(['first'], $fetched);
        $this->assertFalse($afterFetch);
    }

    public function testRemoveRealmRemovesSessionAndStaticValues(): void
    {
        Session::add('test_realm', 'key', 'first');
        Session::remove('test_realm');

        $this->assertFalse(Session::show('test_realm'));
    }

    public function testRemoveKeyRemovesOnlySpecifiedKey(): void
    {
        Session::add('test_realm', 'a', 'first');
        Session::add('test_realm', 'b', 'second');

        Session::remove('test_realm', 'a');

        $this->assertFalse(Session::show('test_realm', 'a'));
        $this->assertSame(['second'], Session::show('test_realm', 'b'));
    }

    public function testRemoveEachValueRemovesOnlySpecifiedOffset(): void
    {
        Session::add('test_realm', 'key', 'first');
        Session::add('test_realm', 'key', 'second');

        Session::remove('test_realm', 'key', 0);

        $this->assertSame(['second'], Session::show('test_realm', 'key'));
    }
}
