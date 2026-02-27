<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

final class AutoloadTest extends TestCase
{
    public function testPsr4AutoloadCanResolveCoreClasses(): void
    {
        $this->assertTrue(class_exists(\Komarushi\Main::class));
        $this->assertTrue(class_exists(\Komarushi\PartRenderer::class));
        $this->assertTrue(class_exists(\Komarushi\PatternResolver::class));
        $this->assertTrue(class_exists(\Kontiki\Input::class));
        $this->assertTrue(class_exists(\Kontiki\Session::class));
        $this->assertTrue(class_exists(\Kontiki\Util::class));
    }
}
