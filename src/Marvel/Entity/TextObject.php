<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Entity;

class TextObject
{
    /**
     * The canonical type of the text object (e.g. solicit text, preview text, etc.).
     *
     * @var string
     */
    private $type;

    /**
     * The IETF language tag denoting the language the text object is written in.
     *
     * @var string
     */
    private $language;

    /**
     * The text.
     *
     * @var string
     */
    private $text;

    /**
     * Initializes a new instance of this class.
     *
     * @param string $type The type of the text object.
     * @param string $language The IETF language tag.
     * @param string $text The text to set.
     */
    public function __construct($type, $language, $text)
    {
        $this->type = $type;
        $this->language = $language;
        $this->text = $text;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getText()
    {
        return $this->text;
    }
}
