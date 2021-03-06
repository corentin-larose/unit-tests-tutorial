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

        $dbAdapter = $this->getConnection()->getConnection();

        $this->instance = new PrimeNumbers($dbAdapter);
    }

    public function tearDown(): void
    {
        $this->instance = null;
    }

    /**
     * @covers \CL\UnitTestingTutorial\PrimeNumbers::displayRandomPrimeNumber()
     */
    public function testDisplayRandomPrimeNumber()
    {
        $this->expectOutputRegex('/[0-9]+/');
        $this->instance->displayRandomPrimeNumber();
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
