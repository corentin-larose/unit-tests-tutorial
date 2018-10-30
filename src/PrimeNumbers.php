<?php

namespace CL\UnitTestingTutorial;

class PrimeNumbers extends AbstractDbAdapter
{
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
