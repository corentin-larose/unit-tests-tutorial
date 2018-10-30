<?php
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
        return array(
            array(1, 3, 1/3),
            array(9, 3, 3.0),
        );
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
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage You can't divide by zero.
     */
    public function testDivideThrowsInvalidArgumentExceptionOnDivisionByZero()
    {
        $this->instance->divide(3, 0);
    }

    public function testMultiply()
    {
        $this->markTestIncomplete();
    }

    /**
     * @expectedException \PHPUnit\Framework\Error\Warning
     */
    public function testPhpWarningOnDivisionByZero()
    {
        $a = 3 / 0;
    }
}
