<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @noinspection PhpCSValidationInspection
 */

declare (strict_types=1);

namespace pvc\html\factory\err;

use pvc\err\XDataAbstract;


/**
 * Class _HtmlXData
 */
class _HtmlXData extends XDataAbstract
{

    public function getLocalXCodes(): array
    {
        return [
            InvalidAttributeNameException::class => 1001,
            InvalidEventNameException::class => 1002,
            InvalidTagNameException::class => 1003,
        ];
    }

    public function getXMessageTemplates(): array
    {
        return [
            InvalidAttributeNameException::class => '${attributeName} is an invalid attribute or event name',
            InvalidEventNameException::class => '${eventName} is not a valid event name.',
            InvalidTagNameException::class => '${tagName} is not a valid tag name.',
        ];
    }
}