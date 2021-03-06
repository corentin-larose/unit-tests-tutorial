<?php

declare(strict_types=1);

namespace CL\UnitTestingTutorialTest;

use CL\UnitTestingTutorial\Maths;
use PHPUnit\Framework\TestCase;

class MathsTest extends TestCase
{
    /**
     * @var Maths
     */
    protected $instance;

    /**
     * @see divideTest
     * @return array
     */
    public function divideDataProvider()
    {
        return [
            [9, 3, 3.0],
            [1, 3, 1 / 3],
            'scientific_notation' => [1.2e3, 3, 1.2e3 / 3],
        ];
    }

    /**
     * @see multiplyTest
     * @return ArrayIterator
     */
    public function multiplyDataProvider()
    {
        return new \ArrayIterator([
            [3, 3, 9],
            'scientific_notation' => [1.2e3, 3, 1.2e3 * 3],
        ]);
    }

    public function setUp()
    {
        $this->instance = new Maths();
    }

    public function tearDown()
    {
    	$this->instance = null;
    }

    /**
     * @covers \CL\UnitTestingTutorial\Maths::divide()
     * @dataProvider divideDataProvider
     *
     * @param integer $dividend
     * @param integer $denominator
     * @param integer $expectedQuotient
     */
    public function testDivide($dividend, $denominator, $expectedQuotient)
    {
        $actualQuotient = $this->instance->divide($dividend, $denominator);

        $this->assertInternalType('float', $actualQuotient);
        $this->assertSame($expectedQuotient, $actualQuotient);
    }

    /**
     * @covers \CL\UnitTestingTutorial\Maths::divide()
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage You can't divide by zero.
     */
    public function testDivideThrowsInvalidArgumentExceptionOnDivisionByZero()
    {
        $this->instance->divide(3, 0);
    }

    /**
     * @covers \CL\UnitTestingTutorial\Maths::divide()
     */
    public function testDivideThrowsInvalidArgumentExceptionOnDivisionByZeroAnotherWay()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("You can't divide by zero.");

        $this->instance->divide(3, 0);
    }

    public function testIncompleteTest()
    {
        $this->markTestIncomplete();
    }

    /**
     * @testWith [8, 3, 2]
     *           [9, 3, 0]
     *
     * @param integer $dividend
     * @param integer $denominator
     * @param integer $expectedQuotient
     */
    public function testModulo($dividend, $denominator, $expectedQuotient)
    {
        $actualQuotient = $this->instance->modulo($dividend, $denominator);

        $this->assertInternalType('int', $actualQuotient);
        $this->assertSame($expectedQuotient, $actualQuotient);
    }

    /**
     * @covers \CL\UnitTestingTutorial\Maths::multiply()
     * @dataProvider multiplyDataProvider
     *
     * @param integer $multiplier
     * @param integer $multiplicand
     * @param integer $expectedProduct
     */
    public function testMultiply($multiplier, $multiplicand, $expectedProduct)
    {
        $actualProduct = $this->instance->multiply($multiplier, $multiplicand);

        $this->assertInternalType('numeric', $actualProduct);
        $this->assertSame($expectedProduct, $actualProduct);
    }

    /**
     * @coversNothing
     * @expectedException \PHPUnit\Framework\Error\Warning
     */
    public function testPhpWarningOnDivisionByZero()
    {
        $a = 3 / 0;
    }
}
