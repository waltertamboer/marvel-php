<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace MarvelTest\Response;

use Marvel\Response\HttpResponse;

class HttpResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testCodeSetCorrectly()
    {
        // Arrange
        $response = new HttpResponse('http://waltertamboer.nl', 200, '');

        // Act
        $value = $response->getCode();

        // Assert
        $this->assertEquals(200, $value);
    }

    public function testUrlSetCorrectly()
    {
        // Arrange
        $response = new HttpResponse('http://waltertamboer.nl', 200, '');

        // Act
        $value = $response->getUrl();

        // Assert
        $this->assertEquals('http://waltertamboer.nl', $value);
    }

    public function testContentSetCorrectly()
    {
        // Arrange
        $response = new HttpResponse('http://waltertamboer.nl', 200, 'hello');

        // Act
        $value = $response->getContent();

        // Assert
        $this->assertEquals('hello', $value);
    }

    /**
     * @expectedException \Marvel\Exception\InvalidResponseException
     */
    public function testCannotParseIncorrectJson()
    {
        // Arrange
        $response = new HttpResponse('http://waltertamboer.nl', 200, 'hello');

        // Act
        $value = $response->getJsonObject();

        // Assert
    }

    public function testCanParseCorrectJson()
    {
        // Arrange
        $response = new HttpResponse('http://waltertamboer.nl', 200, '{}');

        // Act
        $value = $response->getJsonObject();

        // Assert
        $this->assertInstanceOf('stdClass', $value);
    }
}
