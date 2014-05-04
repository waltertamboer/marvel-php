<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Entity;

class SeriesSummary
{
    private $resourceURI;
    private $name;

    public function __construct($resourceURI, $name)
    {
        $this->resourceURI = $resourceURI;
        $this->name = $name;
    }

    public function getResourceURI()
    {
        return $this->resourceURI;
    }

    public function getName()
    {
        return $this->name;
    }
}
