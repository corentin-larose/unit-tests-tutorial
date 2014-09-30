<?php
namespace CL\UnitTestingTutorialTest;

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

    public function testClassImplementsDbAdapterInterface()
    {
    	$this->assertInstanceOf('\CL\UnitTestingTutorial\DbAdapterInterface', $this->instance);
    }

    public function testFoo()
    {
    	$actual = $this->instance->foo('test', 'ok');
    	$this->assertSame('test ok', $actual);
    }

    /**
     * @depends testClassImplementsDbAdapterInterface
     */
    public function testSetDbAdapter()
    {
        $adapter = 'test';

        $this->instance->setDbAdapter($adapter);

        $this->assertSame($adapter, $this->instance->getDbAdapter());
    }
}

class Wrapper extends AbstractDbAdapter
{
    public function __call($method, $args)
    {
        return call_user_func_array([$this, $method], $args);
    }

    public function getDbAdapter()
    {
        return $this->dbAdapter;
    }
}
