<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\DataWrapper;

use Marvel\DataContainer\AbstractDataContainer;

abstract class AbstractDataWrapper
{
    /**
     * The HTTP status code of the returned result.
     *
     * @var int
     */
    private $code;

    /**
     * A string description of the call status.
     *
     * @var string
     */
    private $status;

    /**
     * The copyright notice for the returned result.
     *
     * @var string
     */
    private $copyright;

    /**
     * The attribution notice for this result. Please display either this notice or the contents of the attributionHTML field on all screens which contain data from the Marvel Comics API.
     *
     * @var string
     */
    private $attributionText;

    /**
     * An HTML representation of the attribution notice for this result. Please display either this notice or the contents of the attributionText field on all screens which contain data from the Marvel Comics API.
     *
     * @var string
     */
    private $attributionHTML;

    /**
     * The results returned by the call.
     *
     * @var AbstractDataContainer
     */
    private $data;

    /**
     * A digest value of the content returned by the call
     *
     * @var string
     */
    private $etag;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getCopyright()
    {
        return $this->copyright;
    }

    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
    }

    public function getAttributionText()
    {
        return $this->attributionText;
    }

    public function setAttributionText($attributionText)
    {
        $this->attributionText = $attributionText;
    }

    public function getAttributionHTML()
    {
        return $this->attributionHTML;
    }

    public function setAttributionHTML($attributionHTML)
    {
        $this->attributionHTML = $attributionHTML;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData(AbstractDataContainer $data)
    {
        $this->data = $data;
    }

    public function getEtag()
    {
        return $this->etag;
    }

    public function setEtag($etag)
    {
        $this->etag = $etag;
    }
}
