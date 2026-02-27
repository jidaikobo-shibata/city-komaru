<?php

declare(strict_types=1);

namespace Tests;

use Komarushi\TestPatternGenerator;
use PHPUnit\Framework\TestCase;

final class TestPatternGeneratorTest extends TestCase
{
    public function testGenerateSkipsExcludedCriteriaForNgCodeType(): void
    {
        $codePattern = array(
            '1.1.1a' => array('ng'),
            '1.4.11a' => array('ng'),
        );
        $excludedCriteria = array('1.4.11');

        $actual = TestPatternGenerator::generate('ng', $codePattern, $excludedCriteria);
        $decoded = json_decode(base64_decode($actual), true);

        $this->assertSame(array('1.1.1a' => 'ng'), $decoded);
    }

    public function testGenerateSkipsOkSuffixes(): void
    {
        $codePattern = array(
            '1.1.1a' => array('ok'),
        );

        $actual = TestPatternGenerator::generate('ng', $codePattern, array());
        $decoded = json_decode(base64_decode($actual), true);

        $this->assertSame(array(), $decoded);
    }
}
