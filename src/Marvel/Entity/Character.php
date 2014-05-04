<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Entity;

use Marvel\Entity\Image;
use Marvel\Entity\Url;
use Marvel\Utils;

class Character
{
    /**
     * The unique ID of the character resource.
     *
     * @var int
     */
    private $id;

    /**
     * The name of the character.
     *
     * @var string
     */
    private $name;

    /**
     * A short bio or description of the character.
     *
     * @var string
     */
    private $description;

    /**
     * The date the resource was most recently modified.
     *
     * @var DateTime
     */
    private $modified;

    /**
     * The canonical URL identifier for this resource.
     *
     * @var string
     */
    private $resourceUri;

    /**
     * A set of public web site URLs for the resource.
     *
     * @var Url[]
     */
    private $urls;

    /**
     * The representative image for this character.
     *
     * @var Image
     */
    private $thumbnail;

    /**
     * A resource list containing comics which feature this character.
     *
     * @var ResourceList
     */
    private $comics;

    /**
     * A resource list of stories in which this character appears.
     *
     * @var ResourceList
     */
    private $stories;

    /**
     * A resource list of events in which this character appears.
     *
     * @var ResourceList
     */
    private $events;

    /**
     * A resource list of series in which this character appears.
     *
     * @var ResourceList
     */
    private $series;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified)
    {
        $this->modified = Utils::parseDateTime($modified);
    }

    public function getResourceUri()
    {
        return $this->resourceUri;
    }

    public function setResourceUri($resourceUri)
    {
        $this->resourceUri = $resourceUri;
    }

    public function addUrl(Url $url)
    {
        $this->urls[] = $url;
    }

    public function getUrls()
    {
        return $this->urls;
    }

    public function setUrls($urls)
    {
        $this->urls = array();
        foreach ($urls as $url) {
            $this->addUrl($url);
        }
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Image $thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    public function getComics()
    {
        return $this->comics;
    }

    public function setComics(ResourceList $comics)
    {
        $this->comics = $comics;
    }

    public function getStories()
    {
        return $this->stories;
    }

    public function setStories(ResourceList $stories)
    {
        $this->stories = $stories;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function setEvents(ResourceList $events)
    {
        $this->events = $events;
    }

    public function getSeries()
    {
        return $this->series;
    }

    public function setSeries(ResourceList $series)
    {
        $this->series = $series;
    }
}
