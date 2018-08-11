<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <jbrauer.inc@gmail.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Calculator\Formula\Fahrenheit;

use UnitConverter\Calculator\Formula\AbstractFormula;

/**
 * Formula to convert Fahrenheit values to Kelvin.
 *
 * @version 1.0.0
 * @since 0.8.1
 * @author Jordan Brauer <jbrauer.inc@gmail.com>
 */
class ToKelvin extends AbstractFormula
{
    const MAGIC_NUMBER = 459.67;

    protected $string = 'K = (°F + 459.67) × (5 ÷ 9)';

    /**
     * {@inheritDoc}
     */
    public function describe($value, $fromUnits, $toUnits, int $precision = null)
    {
        $divisor = $this->calculator->div(5, 9);

        return $this->calculator->round(
            $this->calculator->mul(
                $this->calculator->add($value, self::MAGIC_NUMBER),
                $divisor
            ),
            $precision
        );
    }
}
