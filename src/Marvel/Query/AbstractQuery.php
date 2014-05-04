<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Query;

abstract class AbstractQuery implements QueryInterface
{
    const PARAM_LIMIT = 'limit';
    const PARAM_OFFSET = 'offset';

    private $params;

    public function __construct()
    {
        $this->params = array();
    }

    public function getLimit()
    {
        return $this->getParam(self::PARAM_LIMIT);
    }

    public function setLimit($limit)
    {
        $this->setParam(self::PARAM_LIMIT, $limit);
    }

    public function getOffset()
    {
        return $this->getParam(self::PARAM_OFFSET);
    }

    public function setOffset($offset)
    {
        $this->setParam(self::PARAM_OFFSET, $offset);
    }

    /**
     * Gets the parameter with the given name.
     *
     * @param string $name The name of the parameter to get.
     * @param mixed $defaultValue The default value to return.
     * @return mixed
     */
    public function getParam($name, $defaultValue = null)
    {
        if (array_key_exists($name, $this->params)) {
            return $this->params[$name];
        }

        return $defaultValue;
    }

    /**
     * Gets all the parameters of this query.
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Sets a parameter.
     * @param string $name The name of the parameter to set.
     * @param string $value The value of the parameter to set.
     */
    public function setParam($name, $value)
    {
        $this->params[$name] = $value;
    }
}
