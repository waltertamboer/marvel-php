<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace MarvelTest\Query;

use Marvel\Query\Query;

class QueryTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetParam()
    {
        // Arrange
        $query = new Query();

        // Act
        $query->setParam('param', 'value');

        // Assert
        $this->assertArrayHasKey('param', $query->getParams());
        $this->assertEquals('value', $query->getParam('param'));
    }

    public function testInvalidGetParam()
    {
        // Arrange
        $query = new Query();

        // Act

        // Assert
        $this->assertNull($query->getParam('param'));
    }

    public function testEmptyParams()
    {
        // Arrange
        $query = new Query();

        // Assert
        $this->assertCount(0, $query->getParams());
    }

    public function testGetParams()
    {
        // Arrange
        $query = new Query();

        // Act
        $query->setParam('param', 'value');

        // Assert
        $this->assertCount(1, $query->getParams());
    }

    public function testLimitParameter()
    {
        // Arrange
        $query = new Query();

        // Act
        $query->setLimit(10);

        // Assert
        $this->assertEquals(10, $query->getLimit());
    }

    public function testOffsetParameter()
    {
        // Arrange
        $query = new Query();

        // Act
        $query->setOffset(10);

        // Assert
        $this->assertEquals(10, $query->getOffset());
    }
}
