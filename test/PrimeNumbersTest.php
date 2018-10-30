<?php

declare(strict_types=1);

namespace CL\UnitTestingTutorialTest;

use CL\UnitTestingTutorial\PrimeNumbers;

class PrimeNumbersTest extends AbstractDbUnit
{
    /**
     * @var array
     */
    protected static $fixtures
        = [
            '/unit_tests_tutorial.xml',
        ];

    /**
     * @var PrimeNumbers
     */
    protected $instance;

    public function setUp(): void
    {
        $this->getDatabaseTester()->setDataSet($this->getDataSet());
        $this->getDatabaseTester()->onSetUp();

        $this->instance = new PrimeNumbers();
        $this->instance->setDbAdapter($this->getConnection()->getConnection());
    }

    public function tearDown(): void
    {
        $this->instance = null;
    }

    /**
     * @covers \CL\UnitTestingTutorial\PrimeNumbers::displayFirstPrimeNumber()
     */
    public function testDisplayFirstPrimeNumber()
    {
        $this->expectOutputString('1');
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
