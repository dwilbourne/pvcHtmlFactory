<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\html\factory\val_tester\callable;

use pvc\intl\LanguageCodes;
use pvc\validator\val_tester\callable\CallableTester;

/**
 * Class CallableTesterLang
 * @extends CallableTester<string>
 */
class CallableTesterLang extends CallableTester
{
     public function __construct()
     {
         parent::__construct([LanguageCodes::class, 'validate']);
     }
}
