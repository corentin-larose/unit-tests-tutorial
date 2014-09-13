<?php
namespace CL\UnitTestingTutorial;

class Maths
{
    /**
     * @param  numeric                   $dividend
     * @param  numeric                   $denominator
     * @throws \InvalidArgumentException
     * @return float
     */
    public function divide($dividend, $denominator)
    {
        if (0 == $denominator) {
            throw new \InvalidArgumentException("You can't divide by zero.");
        }

        return (float) ($dividend / $denominator);
    }

    /**
     * @param numeric $a
     * @param numeric $b
     * @return numeric
     */
    public function multiply($a, $b)
    {
    	return $a * $b;
    }
}
