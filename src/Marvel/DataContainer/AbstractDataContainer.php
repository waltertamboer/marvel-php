<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\DataContainer;

abstract class AbstractDataContainer implements \Countable, \IteratorAggregate, \ArrayAccess
{
    // TODO: Should we move this to a derived class?
    private $results;

    /**
     * The requested offset (number of skipped results) of the call.
     *
     * @var int
     */
    private $offset;

    /**
     * The requested result limit.
     *
     * @var int
     */
    private $limit;

    /**
     * The total number of resources available given the current filter set.
     *
     * @var int
     */
    private $total;

    /**
     * The total number of results returned by this call.
     *
     * @var int
     */
    private $count;

    /**
     * Initializes a new instance of this class.
     */
    public function __construct()
    {
        $this->results = array();
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;
    }

    public function add($item)
    {
        $this->results[] = $item;
    }

    public function contains($item)
    {
        foreach ($this->results as $tmp) {
            if ($tmp === $item) {
                return true;
            }
        }
        return false;
    }

    public function count()
    {
        return count($this->results);
    }

    public function get($index)
    {
        return $this->results[$index];
    }

    public function remove($item)
    {
        for ($i = count($this->results) - 1; $i >= 0; --$i) {
            if ($this->results[$i] === $item) {
                unset($this->results[$i]);
            }
        }

        $this->results = array_values($this->results);
    }

    public function removeAt($index)
    {
        unset($this->results[$index]);

        $this->results = array_values($this->results);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->results);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->results);
    }

    public function offsetGet($offset)
    {
        return $this->results[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->results[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->results[$offset]);
    }
}
