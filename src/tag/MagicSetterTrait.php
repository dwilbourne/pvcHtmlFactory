<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\html\factory\tag;

use pvc\html\factory\err\InvalidAttributeNameException;
use pvc\html\factory\factory\HtmlFactory;
use pvc\interfaces\html\attribute\AttributeMultiValueInterface;
use pvc\interfaces\html\attribute\AttributeSingleValueInterface;
use pvc\interfaces\html\factory\HtmlFactoryInterface;

/**
 * Class MagicSetterTrait
 */
trait MagicSetterTrait
{
    protected HtmlFactoryInterface $factory;

    /**
     * getFactory
     * @return HtmlFactory
     */
    public function getFactory(): HtmlFactoryInterface
    {
        return $this->factory;
    }

    /**
     * setFactory
     * @param HtmlFactory $factory
     */
    public function setFactory(HtmlFactoryInterface $factory): void
    {
        $this->factory = $factory;
    }

    public function __set(string $attributeName, array|string $value)
    {
        /**
         * make the attribute/event if it does not already exist
         */
        if (!$attribute = $this->getAttribute($attributeName)) {
            if ($this->factory->canMakeAttribute($attributeName)) {
                $attribute = $this->factory->makeAttribute($attributeName);
            } elseif ($this->factory->canMakeEvent($attributeName)) {
                $attribute = $this->factory->makeEvent($attributeName);
            } else {
                throw new InvalidAttributeNameException($attributeName);
            }
        }

        /**
         * if the attribute is not a void, set the value
         */
        if ($attribute instanceof AttributeMultiValueInterface) {
            /**
             * the static analyzer will catch a type mismatch.  The php type hint is mixed but the phpdoc types
             * it an as array
             */
            $attribute->setValues($value);
        } elseif ($attribute instanceof AttributeSingleValueInterface) {
            /**
             * the static analyzer will catch a type mismatch.  The php type hint is mixed but the phpdoc types
             * it an as array
             */
            $attribute->setValue($value);
        }

        /**
         * add the attribute to the tag
         */
        $this->setAttribute($attribute);
    }
}
