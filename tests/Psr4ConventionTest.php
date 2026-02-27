<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

final class Psr4ConventionTest extends TestCase
{
    public function testClassFilesFollowPsr4ConventionsAndAreAutoloadable(): void
    {
        $classFiles = glob(__DIR__ . '/../system/classes/*.php');
        $this->assertIsArray($classFiles);
        $this->assertNotEmpty($classFiles);

        foreach ($classFiles as $file) {
            $code = file_get_contents($file);
            $this->assertIsString($code, 'Failed to read ' . $file);

            preg_match('/^namespace\s+([^;]+);/m', $code, $namespaceMatch);
            preg_match('/^class\s+([A-Za-z_][A-Za-z0-9_]*)/m', $code, $classMatch);

            $this->assertArrayHasKey(1, $namespaceMatch, 'Missing namespace in ' . $file);
            $this->assertArrayHasKey(1, $classMatch, 'Missing class declaration in ' . $file);

            $classNameFromFile = pathinfo($file, PATHINFO_FILENAME);
            $this->assertSame($classNameFromFile, $classMatch[1], 'Class/file name mismatch in ' . $file);

            $fqn = '\\' . $namespaceMatch[1] . '\\' . $classMatch[1];
            $this->assertTrue(class_exists($fqn), 'Autoload failed for ' . $fqn);
        }
    }
}
