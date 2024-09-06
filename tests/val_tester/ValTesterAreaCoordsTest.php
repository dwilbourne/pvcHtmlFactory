<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\html\factory\val_tester;

use PHPUnit\Framework\TestCase;
use pvc\html\factory\err\InvalidAreaShapeException;
use pvc\html\factory\val_tester\ValTesterAreaCoords;

class ValTesterAreaCoordsTest extends TestCase
{
    protected ValTesterAreaCoords $tester;

    public function setUp(): void
    {
        $this->tester = new ValTesterAreaCoords();
    }

    /**
     * testShapeDefault
     * @coversNothing
     */
    public function testShapeDefault(): void
    {
        self::assertEquals('rect', $this->tester->getShape());
    }

    /**
     * testSetGetShape
     * @param string $input
     * @param string $expectedResult
     * @param $comment
     * @throws InvalidAreaShapeException
     * @covers       \pvc\html\factory\val_tester\ValTesterAreaCoords::setShape
     * @covers       \pvc\html\factory\val_tester\ValTesterAreaCoords::getShape
     * @dataProvider shapeProvider
     */
    public function testSetGetShape(string $input, string $expectedResult, $comment): void
    {
        $this->tester->setShape($input);
        self::assertEquals($expectedResult, $this->tester->getShape(), $comment);
    }

    public function shapeProvider(): array
    {
        return [
            ['circle', 'circle', 'failed to set circle properly'],
            ['CiRcLe', 'circle', 'failed to set CiRcLe properly'],
            ['rect', 'rect', 'failed to set rect properly'],
            ['poly', 'poly', 'failed to set poly correctly'],
        ];
    }

    /**
     * testBadShapeThrowsException
     * @throws InvalidAreaShapeException
     * @covers \pvc\html\factory\attribute\val_tester\ValTesterAreaCoords::setShape
     */
    public function testBadShapeThrowsException(): void
    {
        self::expectException(InvalidAreaShapeException::class);
        $this->tester->setShape('foo');
    }

    /**
     * testTestValue
     * @param string $input
     * @param bool $expectedResult
     * @param string $comment
     * @covers        \pvc\html\factory\attribute\val_tester\ValTesterAreaCoords::testValue
     * @dataProvider  coordinateProvider
     */
    public function testTestValue(string $shape, string $coords, bool $expectedResult, string $comment): void
    {
        $this->tester->setShape($shape);
        self::assertEquals($expectedResult, $this->tester->testValue($coords), $comment);
    }

    public function coordinateProvider(): array
    {
        return [
            '4 numeric coords' => ['rect', '12, 34, 56, 78', true, 'failed to validate 12, 34, 56, 78 for rect'],
            'must be numeric' => ['rect', '12f, 34, 56, 78', false, 'incorrectly validated 12f, 34, 56, 78 for rect'],
            'must be 4' => ['rect', '12, 34, 56', false, 'incorrectly validated 12, 34, 56 for rect'],
            'wrong number coords for circle' => ['circle', '12, 34', false, 'incorrectly validated 12 34 for circle'],
            'correct circle coords' => ['circle', '12, 34, 56', true, 'failed to validate 12, 34, 56 for circle'],
            'not allowing negative values for coord' => ['circle', '12, -34, -56', false, 'wrongly validated 12, -34, -56'],
            'poly must have even number coords' => ['poly', '12, 34, 56, 78, 91', false, 'wrongly validated odd number coords for poly'],
            'poly must have more than 2 coords' => ['poly', '12, 34', false, 'wrongly validated 2 coords for poly'],
            'poly success with 4' => ['poly', '12, 34, 56, 78', true, 'failed to validate 12, 34, 56, 78 for poly'],
            'poly success with 6' => ['poly', '1, 2, 3, 4, 5, 6', true, 'failed to validate 1, 2, 3, 4, 5, 6 for poly'],
        ];
    }

}
