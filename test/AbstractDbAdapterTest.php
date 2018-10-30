<?php

declare(strict_types=1);

namespace CL\UnitTestingTutorialTest;

use CL\UnitTestingTutorial\AbstractDbAdapter;
use PHPUnit\Framework\TestCase;

class AbstractDbAdapterTest extends TestCase
{
    /**
     * @var Wrapper
     */
    protected $instance;

    protected static function getMethod($class, $method)
    {
        $class = new \ReflectionClass($class);
        $method = $class->getMethod($method);
        $method->setAccessible(true);

        return $method;
    }

    public function setUp()
    {
        $this->instance = new Wrapper();
    }

    public function testClassImplementsDbAdapterInterface()
    {
        $this->assertInstanceOf(
            '\CL\UnitTestingTutorial\DbAdapterInterface', $this->instance
        );
    }

    public function testFoo()
    {
        $actual = $this->instance->foo('test', 'ok');
        $this->assertSame('test ok', $actual);
    }

    public function testFoo2()
    {
        $method = self::getMethod(get_class($this->instance), 'foo');
        $actual = $method->invokeArgs($this->instance, ['test', 'ok']);
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
