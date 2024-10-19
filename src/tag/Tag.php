<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\html\factory\tag;

use pvc\html\abstract\tag\Tag as TagAbstract;
use pvc\interfaces\html\factory\HtmlFactoryInterface;

/**
 * Class Tag
 */
class Tag extends TagAbstract
{
    use MagicSetterTrait;

    public function __construct(HtmlFactoryInterface $factory)
    {
        $this->setFactory($factory);
    }
}
