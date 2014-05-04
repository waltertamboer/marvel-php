<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Request\Socket;

use Marvel\Exception\InvalidResponseException;
use Marvel\Response\HttpResponse;
use Marvel\Request\AbstractRequest;

class SocketRequest extends AbstractRequest
{
    const CRLF = "\r\n";

    private $timeout;

    public function __construct()
    {
        parent::__construct();

        $this->setTimeout(30);
    }

    public function execute()
    {
        $uri = parse_url($this->getUrl());
        $get = http_build_query($this->getParams());

        $fp = @fsockopen($uri['host'], 80, $errno, $errstr, $this->getTimeout());
        if ($fp === false) {
            throw new InvalidResponseException($errstr, $errno);
        }

        $request = 'GET '. $uri['path'] . '?' . $get . ' HTTP/1.1' . self::CRLF;
        $request .= 'Host: ' . $uri['host'] . self::CRLF;
        $request .= 'User-Agent: ' . $this->getUserAgent() . self::CRLF;
        $request .= 'Connection: Close' . self::CRLF;
        $request .= self::CRLF;
        fwrite($fp, $request);

        $result = '';
        while (!feof($fp)) {
            $result .= fgets($fp, 128);
        }

        fclose($fp);

        $headers = substr($result, 0, strpos($result, self::CRLF . self::CRLF));
        $content = substr($result, strpos($result, self::CRLF . self::CRLF) + 4);

        $splittedHeaders = explode(self::CRLF, $headers);
        if (!preg_match('/^HTTP\/1\.1 ([0-9]+) (.+?)$/i', $splittedHeaders[0], $matches)) {
            throw new InvalidResponseException($errstr, $errno);
        }

        return new HttpResponse($this->getUrl(), $matches[1], $content);
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }
}
