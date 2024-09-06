<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\html\factory\val_tester;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class ValTesterTitle
 * @implements ValTesterInterface<string>
 */
class ValTesterTitle implements ValTesterInterface
{
    const MAX_TITLE_LENGTH = 100;

    public function testValue(mixed $value): bool
    {
        return (self::MAX_TITLE_LENGTH >= strlen($value));
    }
}