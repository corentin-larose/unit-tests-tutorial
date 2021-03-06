<?php

namespace CL\UnitTestingTutorial;

class PrimeNumbers
{
    /**
     * @var
     */
    protected $dbAdapter;

    /**
     * PrimeNumbers constructor.
     *
     * @param $dbAdapter
     */
    public function __construct($dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    public function displayRandomPrimeNumber(): void
    {
        $stmt = $this->dbAdapter
            ->prepare(
                'SELECT prime_number FROM unit_tests_tutorial ORDER BY RAND() LIMIT 1'
            );
        $stmt->execute();

        echo (integer)$stmt->fetch(\PDO::FETCH_COLUMN, 0);
    }

    /**
     * @return integer
     */
    public function getGreatestKnown(): int
    {
        $stmt = $this->dbAdapter
            ->prepare(
                'SELECT MAX(prime_number) FROM unit_tests_tutorial LIMIT 1'
            );
        $stmt->execute();

        return (integer)$stmt->fetch(\PDO::FETCH_COLUMN, 0);
    }
}
