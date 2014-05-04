<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Request;

abstract class AbstractRequest
{
    private $url;
    private $params;
    private $userAgent;

    public function __construct()
    {
        $this->params = array();
        $this->userAgent = 'waltertamboer/marvel-php';
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function clearParams()
    {
        $this->params = array();
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setParam($name, $value)
    {
        $this->params[$name] = $value;
    }

    public function setParams($params)
    {
        $this->params = array();
        foreach ($params as $name => $value) {
            $this->setParam($name, $value);
        }
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }
}
