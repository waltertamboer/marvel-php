<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Entity;

class Image
{
    private $path;
    private $extension;

    public function __construct($path, $extension)
    {
        $this->path = $path;
        $this->extension = $extension;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function __toString()
    {
        return $this->path . '.' . $this->extension;
    }
}
