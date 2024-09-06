<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\html\factory\val_tester\callable;

use pvc\intl\Charset;
use pvc\validator\val_tester\callable\CallableTester;

/**
 * Class CallableTesterCharset
 * @extends CallableTester<string>
 */
class CallableTesterCharset extends CallableTester
{
    public function __construct()
    {
        parent::__construct([Charset::class, 'isValid']);
    }
}
