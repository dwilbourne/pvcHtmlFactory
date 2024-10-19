<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\html\factory\factory;

use pvc\html\factory\factory\HtmlFactory;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\html\attribute\AttributeVoidInterface;
use pvc\interfaces\html\attribute\EventInterface;
use pvc\interfaces\html\tag\TagVoidInterface;

class HtmlFactoryTest extends TestCase
{
    protected HtmlFactory $factory;

    public function setUp(): void
    {
        $this->factory = new HtmlFactory();
    }

    /**
     * testAttributeDefinitions
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \pvc\html\factory\err\InvalidAttributeNameException
     * @covers \pvc\html\factory\factory\HtmlFactory::makeAttribute
     */
    public function testAttributeDefinitions(): void
    {
        $definitionNames = $this->factory->getDefinitionNames('Attributes');
        foreach ($definitionNames as $definitionName) {
            self::assertInstanceOf(AttributeVoidInterface::class, $this->factory->makeAttribute($definitionName));
        }
    }

    /**
     * testElementDefinitions
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \pvc\html\factory\err\InvalidTagNameException
     * @covers \pvc\html\factory\factory\HtmlFactory::makeElement
     * @covers \pvc\html\factory\factory\HtmlFactory::getDefinitionNames
     */
    public function testElementDefinitions(): void
    {
        $definitionNames = $this->factory->getDefinitionNames('Tags');
        foreach ($definitionNames as $definitionName) {
            self::assertInstanceOf(TagVoidInterface::class, $this->factory->makeElement($definitionName));
        }
    }

    /**
     * testEventDefinitions
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \pvc\html\factory\err\InvalidEventNameException
     * @covers \pvc\html\factory\factory\HtmlFactory::makeEvent
     */
    public function testEventDefinitions(): void
    {
        $definitionNames = $this->factory->getDefinitionNames('Events');
        foreach ($definitionNames as $definitionName) {
            self::assertInstanceOf(EventInterface::class, $this->factory->makeEvent($definitionName));
        }
    }
}
