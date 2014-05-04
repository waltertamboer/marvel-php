<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Entity;

class StorySummary
{
    private $resourceURI;
    private $name;
    private $type;

    public function __construct($resourceURI, $name, $type)
    {
        $this->resourceURI = $resourceURI;
        $this->name = $name;
        $this->type = $type;
    }

    public function getResourceURI()
    {
        return $this->resourceURI;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }
}
