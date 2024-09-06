<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\html\factory\definitions;

use DI\ContainerBuilder;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use pvc\html\abstract\attribute\Attribute;
use pvc\html\abstract\tag\TagVoid;
use pvc\interfaces\validator\ValTesterInterface;

class DefinitionsTest extends TestCase
{
    protected array $definitions;

    protected ContainerInterface $container;

    public function setUp(): void
    {
        $builder = new ContainerBuilder();

        $definitionsDir = __DIR__ . '\..\..\src\definitions\\';
        $attributeDefinitions = include($definitionsDir . 'Attributes.php');
        $tagDefinitions = include($definitionsDir . 'Tags.php');
        $eventDefinitions = include($definitionsDir . 'Events.php');

        $this->definitions = array_merge($attributeDefinitions, $tagDefinitions, $eventDefinitions);
        // $this->definitions = $tagDefinitions;
        $builder->addDefinitions($this->definitions);

        $this->container = $builder->build();
    }

    /**
     * testDefinitions
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @covers \pvc\html\factory\definitions\Attributes.php
     * @covers \pvc\html\factory\definitions\Events.php
     * @covers \pvc\html\factory\definitions\Tags.php
     */
    public function testDefinitions(): void
    {
        foreach ($this->definitions as $key => $value) {
            echo("processing $key\r\n");
            $object = $this->container->get($key);
            if ($object instanceof Attribute) {
                /**
                 * the type attribute has three different constructions, depending on whether the type
                 * attribute is inside a button element, an input element, or one of the other elements in which it
                 * can reside (where it specifies a mime type)
                 */
                if ('type' != $object->getName()) {
                    self::assertEquals($key, $object->getName());
                }
                self::assertInstanceOf(ValTesterInterface::class, $object->getTester());
            }
            if ($object instanceof TagVoid) {
                self::assertIsArray($object->getAllowedAttributes());
            }
        }
    }
}
