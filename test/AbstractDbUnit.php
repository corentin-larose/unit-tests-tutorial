<?php
namespace CL\UnitTestingTutorialTest;

abstract class AbstractDbUnit extends \PHPUnit_Extensions_Database_TestCase
{
    /**
     * @var \PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     */
    private $conn = null;

    /**
     * @var array
     */
    protected static $fixtures = [];

    /**
     * @var \PDO
     */
    private static $pdo = null;

    /**
     * @return PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     */
    final public function getConnection()
    {
        if (null === $this->conn) {
            if (null === self::$pdo) {
                self::$pdo = new \PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWORD']);
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
        }

        return $this->conn;
    }

    /**
     * @return \PHPUnit_Extensions_Database_DataSet_CompositeDataSet
     */
    public function getDataSet()
    {
        $datasets = [];

        foreach (static::$fixtures as $fixture) {
            $datasets[] = $this->createMySQLXMLDataSet($GLOBALS['DB_FIXTURES_DIR'] . $fixture);
        }

        $compositeDataSet = new \PHPUnit_Extensions_Database_DataSet_CompositeDataSet($datasets);

        return $compositeDataSet;
    }
}
