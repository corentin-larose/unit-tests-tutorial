<?php

declare(strict_types=1);

namespace CL\UnitTestingTutorial;

abstract class AbstractDbAdapter implements DbAdapterInterface
{
    /**
     * @var unknown
     */
    protected $dbAdapter;

    /**
     * @param scalar $arg1
     * @param scalar $arg2
     *
     * @return string
     */
    protected function foo(string $arg1, string $arg2): string
    {
        return "$arg1 $arg2";
    }

    /**
     * @param unknown $adapter
     *
     * @return self
     */
    public function setDbAdapter($adapter): self
    {
        $this->dbAdapter = $adapter;

        return $this;
    }
}
