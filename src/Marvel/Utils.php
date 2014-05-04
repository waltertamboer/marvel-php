<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel;

use DateTime;
use InvalidArgumentException;

class Utils
{
    public static function parseDateTime($value)
    {
        if (is_string($value)) {
            $dateTime = new DateTime($value);
        } else if (is_int($value)) {
            $dateTime = new DateTime();
            $dateTime->setTimestamp($value);
        } else if ($value instanceof DateTime) {
            $dateTime = $value;
        } else {
            throw new InvalidArgumentException('Expected a string, int or DateTime instance.');
        }

        return $dateTime;
    }
}
