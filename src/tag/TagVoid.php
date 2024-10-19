<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\html\factory\tag;

use \pvc\html\abstract\tag\TagVoid as TagVoidAbstract;
use pvc\interfaces\html\factory\HtmlFactoryInterface;

/**
 * Class TagVoid
 */
class TagVoid extends TagVoidAbstract
{
    use MagicSetterTrait;

    public function __construct(HtmlFactoryInterface $factory)
    {
        $this->setFactory($factory);
    }
}