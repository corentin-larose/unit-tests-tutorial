<?php
namespace CL\UnitTestingTutorialtest;

use CL\UnitTestingTutorial\PrimeNumbers;

class PrimeNumbersTest extends AbstractDbUnit
{
    /**
     * @var array
     */
    protected static $fixtures = [
        '/unit_tests_tutorial.xml',
    ];

    /**
     * @var PrimeNumbers
     */
    protected $instance;

    public function setUp()
    {
        $this->getDatabaseTester()->setDataSet($this->getDataSet());
        $this->getDatabaseTester()->onSetUp();

        $this->instance = new PrimeNumbers();
        $this->instance->setDbAdapter($this->getConnection()->getConnection());
    }

    /**
     * @covers \CL\UnitTestingTutorial\PrimeNumbers::getGreatestKnown()
     */
    public function testGetGreatestKnown()
    {
        $actual = $this->instance->getGreatestKnown();

        $this->assertInternalType('integer', $actual);
    }
}
