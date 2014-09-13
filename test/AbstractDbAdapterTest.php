<?php
namespace CL\UnitTestingTutorialtest;

use CL\UnitTestingTutorial\AbstractDbAdapter;

class AbstractDbAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Wrapper
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new Wrapper();
    }

    public function testSetDbAdapter()
    {
        $adapter = 'test';

        $this->instance->setDbAdapter($adapter);

        $this->assertSame($adapter, $this->instance->getDbAdapter());
    }
}

class Wrapper extends AbstractDbAdapter
{
    public function getDbAdapter()
    {
        return $this->dbAdapter;
    }
}