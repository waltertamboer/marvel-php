<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace MarvelTest;

use DateTime;
use Marvel\Utils;

class UtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testCannotParseNull()
    {
        // Arrange
        $value = null;

        // Act
        Utils::parseDateTime($value);

        // Assert
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCannotParseFloat()
    {
        // Arrange
        $value = 1.0;

        // Act
        Utils::parseDateTime($value);

        // Assert
    }

    public function testCanParseInteger()
    {
        // Arrange
        $value = 0;

        // Act
        $result = Utils::parseDateTime($value);

        // Assert
        $this->assertInstanceOf('DateTime', $result);
        $this->assertEquals(1970, $result->format('Y'));
    }

    public function testCanParseTextualString()
    {
        // Arrange
        $value = 'now';

        // Act
        $result = Utils::parseDateTime($value);

        // Assert
        $this->assertInstanceOf('DateTime', $result);
    }

    public function testCanParseDateString()
    {
        // Arrange
        $value = '2000-01-01';

        // Act
        $result = Utils::parseDateTime($value);

        // Assert
        $this->assertInstanceOf('DateTime', $result);
        $this->assertEquals(2000, $result->format('Y'));
    }

    public function testCanParseDateTime()
    {
        // Arrange
        $value = new DateTime('2000-01-01');

        // Act
        $result = Utils::parseDateTime($value);

        // Assert
        $this->assertInstanceOf('DateTime', $result);
        $this->assertEquals(2000, $result->format('Y'));
    }
}
