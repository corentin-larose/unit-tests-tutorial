<?php
namespace CL\UnitTestingTutorial;

abstract class AbstractDbAdapter implements DbAdapterInterface
{
    /**
     * @var unknown
     */
    protected $dbAdapter;

    /**
	 * @param unknown $adapter
	 */
    public function setDbAdapter($adapter)
    {
        $this->dbAdapter = $adapter;
    }
}
