<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\html\factory\val_tester;

use PHPUnit\Framework\TestCase;
use pvc\html\factory\val_tester\ValTesterScript;

class ValTesterScriptTest extends TestCase
{
    /**
     * @var ValTesterScript
     */
    protected ValTesterScript $testerEventScript;

    /**
     * setUp
     */
    public function setUp(): void
    {
        $this->testerEventScript = new ValTesterScript();
    }

    /**
     * testEventScriptTester
     * @param bool $expectedResult
     * @param string $script
     * @param string $comment
     * @covers       \pvc\html\factory\val_tester\ValTesterScript
     * @dataProvider EventScriptTesterDataProvider
     */
    public function testEventScriptTester(bool $expectedResult, string $script, string $comment): void
    {
        self::assertEquals($expectedResult, $this->testerEventScript->testValue($script), $comment);
    }

    /**
     * EventScriptTesterDataProvider
     * @return array<string, bool, string>
     */
    public function EventScriptTesterDataProvider(): array
    {
        return [
            [true, 'some javascript;', 'failed to pass string that has length greater than 2 and ends with a ;'],
            [false, ';', 'wrongly passed a single semi-colon - it does not have length > 2'],
            [false, 'zzzzzzz', 'wrongly passed zzzzzzzz - does not end in a demi-colon'],
        ];
    }

}
