<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\html\factory\factory\definitions;

use pvc\html\factory\factory\HtmlFactory;
use pvc\interfaces\html\factory\HtmlFactoryInterface;

use function DI\create;
/**
 * TagsHelpers
 */
return [
    /**
     * factory used for creating attributes on the fly in the magic setter trait
     */
    HtmlFactoryInterface::class => create(HtmlFactory::class),
];