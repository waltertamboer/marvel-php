<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\DataHandler;

use Marvel\Response\HttpResponse;

interface HandlerInterface
{
    public function getCharacterDataWrapper(HttpResponse $response);
    public function getComicDataWrapper(HttpResponse $response);
    public function getCreatorDataWrapper(HttpResponse $response);
    public function getEventDataWrapper(HttpResponse $response);
    public function getSeriesDataWrapper(HttpResponse $response);
    public function getStoryDataWrapper(HttpResponse $response);
}
