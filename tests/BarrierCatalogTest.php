<?php

declare(strict_types=1);

namespace Tests;

use Komarushi\BarrierCatalog;
use PHPUnit\Framework\TestCase;

final class BarrierCatalogTest extends TestCase
{
    private string $partsDir;

    protected function setUp(): void
    {
        $this->partsDir = sys_get_temp_dir() . '/city_komaru_catalog_' . uniqid('', true);
        mkdir($this->partsDir, 0777, true);
    }

    protected function tearDown(): void
    {
        foreach (glob($this->partsDir . '/*.php') ?: [] as $file) {
            unlink($file);
        }
        @rmdir($this->partsDir);
    }

    public function testCodePatternsReturnsSortedSuffixesByCriterion(): void
    {
        file_put_contents($this->partsDir . '/1.1.1a_ng.php', '<?php');
        file_put_contents($this->partsDir . '/1.1.1a_ok2.php', '<?php');
        file_put_contents($this->partsDir . '/1.1.1a_ok.php', '<?php');

        $patterns = BarrierCatalog::codePatterns($this->partsDir . '/');

        $this->assertSame(['ok', 'ok2', 'ng'], $patterns['1.1.1a']);
    }

    public function testPatternMessagesExtractsHeaderCommentPerPart(): void
    {
        file_put_contents($this->partsDir . '/1.1.1a_ng.php', "/* NG message */\n<?php");
        file_put_contents($this->partsDir . '/1.1.1a_ok.php', "/* OK message */\n<?php");

        $messages = BarrierCatalog::patternMessages(
            $this->partsDir . '/',
            ['1.1.1a' => ['ng', 'ok']]
        );

        $this->assertSame('NG message', $messages['1.1.1a']['ng']);
        $this->assertSame('OK message', $messages['1.1.1a']['ok']);
    }
}
