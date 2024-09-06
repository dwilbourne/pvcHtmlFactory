<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvcTests\html\factory\err;

use pvc\err\XDataTestMaster;
use pvc\html\factory\err\_HtmlXData;

/**
 * Class _HtmlXDataTest
 */
class _HtmlXDataTest extends XDataTestMaster
{
    /**
     * testValidatorXData
     * @throws \ReflectionException
     * @covers \pvc\html\factory\err\_HtmlXData::getLocalXCodes
     * @covers \pvc\html\factory\err\_HtmlXData::getXMessageTemplates
     * @covers \pvc\html\factory\err\InvalidAreaShapeException
     * @covers \pvc\html\factory\err\InvalidAttributeNameException
     * @covers \pvc\html\factory\err\InvalidEventNameException
     * @covers \pvc\html\factory\err\InvalidTagNameException
     */
    public function testValidatorXData(): void
    {
        $xData = new _HtmlXData();
        self::assertTrue($this->verifyLibrary($xData));
    }
}