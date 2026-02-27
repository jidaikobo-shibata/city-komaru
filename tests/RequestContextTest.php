<?php

declare(strict_types=1);

namespace Tests;

use Komarushi\RequestContext;
use PHPUnit\Framework\TestCase;

final class RequestContextTest extends TestCase
{
    public function testResolvePresetReturnsEmptyWhenPresetIsNotAllowed(): void
    {
        $actual = RequestContext::resolvePreset(array('a', 'b'), 'c');
        $this->assertSame('', $actual);
    }

    public function testResolvePresetReturnsPresetWhenAllowed(): void
    {
        $actual = RequestContext::resolvePreset(array('a', 'b'), 'b');
        $this->assertSame('b', $actual);
    }

    public function testNormalizeWcagVersionReturnsFallbackWhenInvalid(): void
    {
        $actual = RequestContext::normalizeWcagVersion(99);
        $this->assertSame(22, $actual);
    }

    public function testNormalizeWcagVersionKeepsAllowedValues(): void
    {
        $this->assertSame(20, RequestContext::normalizeWcagVersion('20'));
        $this->assertSame(21, RequestContext::normalizeWcagVersion('21'));
        $this->assertSame(22, RequestContext::normalizeWcagVersion('22'));
    }
}
