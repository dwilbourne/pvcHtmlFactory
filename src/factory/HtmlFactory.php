<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\html\factory\factory;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use pvc\html\factory\err\InvalidAttributeNameException;
use pvc\html\factory\err\InvalidEventNameException;
use pvc\html\factory\err\InvalidTagNameException;
use pvc\interfaces\html\attribute\AttributeVoidInterface;
use pvc\interfaces\html\attribute\EventInterface;
use pvc\interfaces\html\factory\HtmlFactoryInterface;
use pvc\interfaces\html\tag\TagVoidInterface;

/**
 * Class HtmlFactory
 */
class HtmlFactory implements HtmlFactoryInterface
{
    /**
     * the containers need to be separate because there are 9 attributes and elements that have the same name,
     * so the definitions would step on each other
     */
    protected ContainerInterface $elementContainer;
    protected ContainerInterface $attributeContainer;
    protected ContainerInterface $eventContainer;

    protected string $attributeDefinitionsFile = 'Attributes';

    protected string $elementDefinitionsFile = 'Tags';

    protected string $eventDefinitionsFile = 'Events';

    /**
     * @var string
     * locations of the definitions files
     */
    protected string $definitionsDir = __DIR__ . '/definitions/';

    public function __construct()
    {
        /**
         * builder object does not support removing definitions so create a new builder for each container.
         *
         * the only purpose behind separating the helpers from the attributes is for testing.  We can grab all
         * the keys in the attributes definitions file and create each attribute in a loop....
         */
        $builder = new ContainerBuilder();
        $builder->addDefinitions($this->definitionsDir . 'AttributesHelpers.php');
        $builder->addDefinitions($this->definitionsDir . $this->attributeDefinitionsFile . '.php');
        $this->attributeContainer = $builder->build();

        $builder = new ContainerBuilder();
        $builder->addDefinitions($this->definitionsDir . 'TagsHelpers.php');
        $builder->addDefinitions($this->definitionsDir . $this->elementDefinitionsFile . '.php');
        $this->elementContainer = $builder->build();

        $builder = new ContainerBuilder();
        $builder->addDefinitions($this->definitionsDir . $this->eventDefinitionsFile . '.php');
        $this->eventContainer = $builder->build();
    }

    public function getDefinitionNames(string $definitionsFile): array
    {
        $definitions = include($this->definitionsDir  . $definitionsFile . '.php');
        return array_keys($definitions);
    }

    public function canMakeAttribute(string $attributeName): bool
    {
        return in_array($attributeName, $this->getDefinitionNames($this->attributeDefinitionsFile));
    }

    public function canMakeElement(string $elementName): bool
    {
        return in_array($elementName, $this->getDefinitionNames($this->elementDefinitionsFile));
    }

    public function canMakeEvent(string $eventName): bool
    {
        return in_array($eventName, $this->getDefinitionNames($this->eventDefinitionsFile));
    }

    /**
     * makeAttribute
     * @param string $attributeName
     * @return AttributeVoidInterface
     * @throws InvalidAttributeNameException
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function makeAttribute(string $attributeName): AttributeVoidInterface
    {
        if (!$this->canMakeAttribute($attributeName)) {
            throw new InvalidAttributeNameException($attributeName);
        }
        return $this->attributeContainer->get($attributeName);
    }

    /**
     * makeElement
     * @param string $elementName
     * @return TagVoidInterface
     * @throws InvalidTagNameException
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function makeElement(string $elementName): TagVoidInterface
    {
        if (!$this->canMakeElement($elementName)) {
            throw new InvalidTagNameException($elementName);
        }
        return $this->elementContainer->get($elementName);
    }

    /**
     * makeEvent
     * @param string $eventName
     * @return EventInterface
     * @throws InvalidEventNameException
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function makeEvent(string $eventName): EventInterface
    {
        if (!$this->canMakeEvent($eventName)) {
            throw new InvalidEventNameException($eventName);
        }
        return $this->eventContainer->get($eventName);
    }
}
