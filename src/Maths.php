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
}
