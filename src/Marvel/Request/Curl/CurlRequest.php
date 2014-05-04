<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Request\Curl;

use Marvel\Response\HttpResponse;
use Marvel\Request\AbstractRequest;

class CurlRequest extends AbstractRequest
{
    public function execute()
    {
        $uri = '';
        $uri .= $this->getUrl();
        $uri .= '?' . http_build_query($this->getParams());

        $handle = curl_init();

        $headers = array();
        $headers['Accept'] = '*/*';
        $headers['Accept-Encoding'] = 'gzip';
        //$headers['If-None-Match'] = $etag;

        curl_setopt($handle, CURLOPT_URL, $uri);
        curl_setopt($handle, CURLOPT_USERAGENT, $this->getUserAgent());
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);

        $content = curl_exec($handle);
        $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        curl_close($handle);

        return new HttpResponse($uri, $responseCode, $content);
    }
}
