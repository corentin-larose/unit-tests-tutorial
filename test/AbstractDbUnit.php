<?php

declare(strict_types=1);

namespace CL\UnitTestingTutorialTest;

use PHPUnit\DbUnit\DataSet\CompositeDataSet;
use PHPUnit\DbUnit\TestCase;

abstract class AbstractDbUnit extends TestCase
{
    /**
     * @var \PHPUnit\DbUnit\Database\DefaultConnection
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
     * @return \PHPUnit\DbUnit\Database\DefaultConnection
     */
    final public function getConnection()
    {
        if (null === $this->conn) {
            if (null === self::$pdo) {
                self::$pdo = new \PDO(
                    $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'],
                    $GLOBALS['DB_PASSWORD']
                );
                self::$pdo->setAttribute(
                    \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION
                );
            }
            $this->conn = $this->createDefaultDBConnection(
                self::$pdo, $GLOBALS['DB_DBNAME']
            );

            // TODO: create database
        }

        return $this->conn;
    }

    /**
     * @return \PHPUnit\DbUnit\DataSet\CompositeDataSet
     */
    public function getDataSet()
    {
        $datasets = [];

        foreach (static::$fixtures as $fixture) {
            $datasets[] = $this->createMySQLXMLDataSet(
                $GLOBALS['DB_FIXTURES_DIR'] . $fixture
            );
        }

        $compositeDataSet = new CompositeDataSet($datasets);

        return $compositeDataSet;
    }
}
