<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare (strict_types=1);

namespace pvcTests\html\factory\val_tester\callable;

use PHPUnit\Framework\TestCase;
use pvc\html\factory\val_tester\callable\CallableTesterCharset;

class CallableTesterCharsetTest extends TestCase
{
    protected \pvc\html\factory\val_tester\callable\CallableTesterCharset $tester;

    public function setUp(): void
    {
        $this->tester = new CallableTesterCharset();
    }

    /**
     * testCharsetTester
     * @param string $input
     * @param bool $expectedResult
     * @param string $comment
     * @dataProvider dataProvider
     * @covers \pvc\html\factory\val_tester\callable\CallableTesterCharset::__construct
     */
    public function testCharsetTester(string $input, bool $expectedResult, string $comment): void
    {
        self::assertEquals($expectedResult, $this->tester->testValue($input), $comment);
    }

    public function dataProvider(): array
    {
        return [
            ['utf-8', true, 'failed to validate utf-8'],
            ['UTF-8', true, 'failed to validate UTF-8'],
            ['foo', false, 'incorreectly validated foo'],
        ];
    }
}
