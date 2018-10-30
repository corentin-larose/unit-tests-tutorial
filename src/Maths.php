<?php

declare(strict_types=1);

namespace CL\UnitTestingTutorial;

class Maths
{
    /**
     * @param  numeric $dividend
     * @param  numeric $denominator
     *
     * @throws \InvalidArgumentException
     * @return float
     */
    public function divide($dividend, $denominator): float
    {
        if (0 == $denominator) {
            throw new \InvalidArgumentException("You can't divide by zero.");
        }

        return (float)($dividend / $denominator);
    }

    /**
     * @param  numeric $dividend
     * @param  numeric $denominator
     *
     * @throws \InvalidArgumentException
     * @return int
     */
    public function modulo($dividend, $denominator): int
    {
        if (0 == $denominator) {
            throw new \InvalidArgumentException("You can't divide by zero.");
        }

        return $dividend % $denominator;
    }

    /**
     * @param numeric $multiplicand
     * @param numeric $multiplier
     *
     * @return numeric
     */
    public function multiply($multiplicand, $multiplier)
    {
        return $multiplicand * $multiplier;
    }
}
