<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\html\factory\val_tester;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\html\factory\val_tester\ValTesterMimeType;
use pvc\http\mime\MimeTypes;

class ValTesterMimeTypeTest extends TestCase
{
    protected MimeTypes|MockObject $mimeTypes;
    protected ValTesterMimeType $tester;

    public function setUp(): void
    {
        $this->mimeTypes = $this->createMock(MimeTypes::class);
        $this->tester = new ValTesterMimeType($this->mimeTypes);
    }

    /**
     * testConstruct
     * @covers \pvc\html\factory\val_tester\ValTesterMimeType::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(ValTesterMimeType::class, $this->tester);
    }

    /**
     * testTestValue
     * @covers \pvc\html\factory\val_tester\ValTesterMimeType::testValue
     */
    public function testTestValue(): void
    {
        $mimeType = 'foo/bar';
        $this->mimeTypes->method('isValidMimeTypeName')->willReturn(true);
        self::assertTrue($this->tester->testValue($mimeType));
    }
}
