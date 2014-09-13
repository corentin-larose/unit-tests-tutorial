<?php
namespace CL\UnitTestingTutorialtest;

use CL\UnitTestingTutorial\Maths;

class MathsTest extends \PHPUnit_Framework_TestCase
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
            array(9, 0, '\InvalidArgumentException'),
        );
    }

    public function setUp()
    {
        $this->instance = new Maths();
    }

    /**
     * @covers \CL\UnitTestingTutorial\Maths::divide()
     * @dataProvider divideDataProvider
     *
     * @param integer $dividend
     * @param integer $denominator
     * @param integer $expected
     */
    public function testDivide($dividend, $denominator, $expected)
    {
        if (is_string($expected)) {
            $this->setExpectedException($expected);
        }

        $actualQuotient = $this->instance->divide($dividend, $denominator);

        $this->assertInternalType('float', $actualQuotient);
        $this->assertSame($expected, $actualQuotient);
    }
}
