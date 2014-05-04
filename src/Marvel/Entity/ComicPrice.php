<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Entity;

class ComicPrice
{
    /**
     * A description of the price (e.g. print price, digital price).
     *
     * @var string
     */
    private $type;

    /**
     * The price (all prices in USD).
     *
     * @var float
     */
    private $price;

    /**
     * Initializes a new instance of this class.
     *
     * @param string $type The type to set.
     * @param float $price The price to set.
     */
    public function __construct($type, $price)
    {
        $this->type = $type;
        $this->price = $price;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
