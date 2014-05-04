<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Response;

use Marvel\Exception\InvalidResponseException;

class HttpResponse
{
    private $url;
    private $code;
    private $content;
    private $jsonObject;

    public function __construct($url, $code, $content)
    {
        $this->url = $url;
        $this->code = $code;
        $this->content = $content;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getJsonObject()
    {
        if ($this->jsonObject === null) {
            $this->jsonObject = json_decode($this->getContent());
            if (!$this->jsonObject) {
                throw new InvalidResponseException();
            }
        }
        return $this->jsonObject;
    }
}
