<?php

declare(strict_types=1);

namespace Tests;

use Komarushi\PartRenderer;
use PHPUnit\Framework\TestCase;

final class PartRendererTest extends TestCase
{
    private string $partsDir;

    protected function setUp(): void
    {
        $this->partsDir = sys_get_temp_dir() . '/city_komaru_parts_' . uniqid('', true);
        mkdir($this->partsDir, 0777, true);
    }

    protected function tearDown(): void
    {
        foreach (glob($this->partsDir . '/*.php') ?: [] as $file) {
            unlink($file);
        }
        @rmdir($this->partsDir);
    }

    public function testRenderReturnsIncludedHtmlWhenCriterionIsEnabled(): void
    {
        file_put_contents($this->partsDir . '/9.9.9a_ng.php', '<?php echo "rendered";');

        $actual = PartRenderer::render(
            '9.9.9a',
            false,
            true,
            ['9.9.9a' => 'ng'],
            22,
            ['1.4.11'],
            ['3.3.7'],
            $this->partsDir . '/'
        );

        $this->assertSame('rendered', $actual);
    }

    public function testRenderSkipsCriterionExcludedByWcagVersion(): void
    {
        file_put_contents($this->partsDir . '/1.4.11a_ng.php', '<?php echo "rendered";');

        $actual = PartRenderer::render(
            '1.4.11a',
            false,
            true,
            ['1.4.11a' => 'ng'],
            20,
            ['1.4.11'],
            ['3.3.7'],
            $this->partsDir . '/'
        );

        $this->assertSame('', $actual);
    }
}
