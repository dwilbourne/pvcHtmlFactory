<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\html\factory\val_tester;


use pvc\http\mime\MimeTypes;
use pvc\interfaces\http\mimetype\MimeTypesInterface;
use pvc\interfaces\validator\ValTesterInterface;
use pvc\validator\val_tester\callable\CallableTester;

/**
 * Class CallableTesterMimeType
 * @implements ValTesterInterface<string>
 */
class ValTesterMimeType implements ValTesterInterface
{
    protected MimeTypesInterface $mimeTypes;
    public function __construct(MimeTypesInterface $mimeTypes)
    {
        $this->mimeTypes = $mimeTypes;
    }

    public function testValue(mixed $value): bool
    {
        return $this->mimeTypes->isValidMimeTypeName($value);
    }
}