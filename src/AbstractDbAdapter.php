<?php
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
     * @return string
     */
    protected function foo($arg1, $arg2)
    {
    	return "$arg1 $arg2";
    }

    /**
	 * @param unknown $adapter
	 */
    public function setDbAdapter($adapter)
    {
        $this->dbAdapter = $adapter;
    }
}
