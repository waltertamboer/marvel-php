<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Query;

interface QueryInterface
{
    /**
     * Gets all the parameters of this query.
     *
     * @return array
     */
    public function getParams();

    /**
     * Sets a parameter.
     * @param string $name The name of the parameter to set.
     * @param string $value The value of the parameter to set.
     */
    public function setParam($name, $value);
}
