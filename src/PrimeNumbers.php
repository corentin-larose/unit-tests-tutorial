<?php

namespace CL\UnitTestingTutorial;

class PrimeNumbers extends AbstractDbAdapter
{
    /**
     * @return integer
     */
    public function displayRandomPrimeNumber(): int
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
