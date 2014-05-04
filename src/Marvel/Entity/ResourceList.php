<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Entity;

class ResourceList
{
    /**
     * The number of total available resources in this list. Will always be greater than or equal
     * to the "returned" value.
     *
     * @var int
     */
    private $available;

    /**
     * The number of resources returned in this collection (up to 20).
     *
     * @var int
     */
    private $returned;

    /**
     * The path to the full list of stories in this collection.
     *
     * @var string
     */
    private $collectionURI;

    /**
     * The list of returned resources in this collection.
     *
     * @var array
     */
    private $items;

    public function __construct()
    {
        $this->available = 0;
        $this->returned = 0;
        $this->items = array();
    }

    public function getAvailable()
    {
        return $this->available;
    }

    public function setAvailable($available)
    {
        $this->available = $available;
    }

    public function getReturned()
    {
        return $this->returned;
    }

    public function setReturned($returned)
    {
        $this->returned = $returned;
    }

    public function getCollectionURI()
    {
        return $this->collectionURI;
    }

    public function setCollectionURI($collectionURI)
    {
        $this->collectionURI = $collectionURI;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }
}
