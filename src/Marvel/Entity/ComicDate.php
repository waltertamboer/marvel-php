<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Entity;

use DateTime;
use Marvel\Utils;

class ComicDate
{
    /**
     * A description of the date (e.g. onsale date, FOC date).
     *
     * @var string
     */
    private $type;

    /**
     * The date.
     *
     * @var DateTime
     */
    private $date;

    /**
     * Initializes a new instance of this class.
     *
     * @param string $type The type to set.
     * @param string|int|DateTime $date The date to set.
     */
    public function __construct($type, $date)
    {
        $this->type = $type;
        $this->date = Utils::parseDateTime($date);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDate()
    {
        return $this->date;
    }
}
