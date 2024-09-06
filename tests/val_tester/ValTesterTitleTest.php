<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\html\factory\val_tester;

use PHPUnit\Framework\TestCase;
use pvc\html\factory\val_tester\ValTesterTitle;

class ValTesterTitleTest extends TestCase
{
    protected ValTesterTitle $tester;

    public function setUp(): void
    {
        $this->tester = new ValTesterTitle();
    }

    /**
     * testValTesterTitle
     * @param string $title
     * @param bool $expectedOutput
     * @param string $comment
     * @dataProvider valTesterTitleDataProvider
     * @covers \pvc\html\factory\val_tester\ValTesterTitle
     */
    public function testValTesterTitle(string $title, bool $expectedOutput, string $comment): void
    {
        self::assertEquals($expectedOutput, $this->tester->testValue($title), $comment);
    }

    public function valTesterTitleDataProvider(): array
    {
        return [
            ['short title', true, 'failed on short title test'],
            [
                'long title XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
                false,
                'failed long title test'
            ],
        ];
    }
}
