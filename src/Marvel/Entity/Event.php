<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\Entity;

use Marvel\Utils;

class Event
{
    /**
     * The unique ID of the event resource.
     *
     * @var int
     */
    private $id;

    /**
     * The title of the event.
     *
     * @var string
     */
    private $title;

    /**
     * A description of the event.
     *
     * @var string
     */
    private $description;

    /**
     * The canonical URL identifier for this resource.
     *
     * @var string
     */
    private $resourceURI;

    /**
     * A set of public web site URLs for the event.
     *
     * @var Url[]
     */
    private $urls;

    /**
     * The date the resource was most recently modified.
     *
     * @var DateTime
     */
    private $modified;

    /**
     * The date of publication of the first issue in this event.
     *
     * @var DateTime
     */
    private $start;

    /**
     * The date of publication of the last issue in this event.
     *
     * @var DateTime
     */
    private $end;

    /**
     * The representative image for this event.
     *
     * @var Image
     */
    private $thumbnail;

    /**
     * A resource list containing the comics in this event.
     *
     * @var ResourceList
     */
    private $comics;

    /**
     * A resource list containing the stories in this event.
     *
     * @var ResourceList
     */
    private $stories;

    /**
     * A resource list containing the series in this event.
     *
     * @var ResourceList
     */
    private $series;

    /**
     * A resource list containing the characters which appear in this event.
     *
     * @var ResourceList
     */
    private $characters;

    /**
     * A resource list containing creators whose work appears in this event.
     *
     * @var ResourceList
     */
    private $creators;

    /**
     * A summary representation of the event which follows this event.
     *
     * @var EventSummary
     */
    private $next;

    /**
     * A summary representation of the event which preceded this event.
     *
     * @var EventSummary
     */
    private $previous;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getResourceURI()
    {
        return $this->resourceURI;
    }

    public function setResourceURI($resourceURI)
    {
        $this->resourceURI = $resourceURI;
    }

    public function getUrls()
    {
        return $this->urls;
    }

    public function setUrls($urls)
    {
        $this->urls = $urls;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified)
    {
        $this->modified = Utils::parseDateTime($modified);
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = Utils::parseDateTime($start);
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end)
    {
        $this->end = Utils::parseDateTime($end);
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

    public function getSeries()
    {
        return $this->series;
    }

    public function setSeries(ResourceList $series)
    {
        $this->series = $series;
    }

    public function getCharacters()
    {
        return $this->characters;
    }

    public function setCharacters(ResourceList $characters)
    {
        $this->characters = $characters;
    }

    public function getCreators()
    {
        return $this->creators;
    }

    public function setCreators(ResourceList $creators)
    {
        $this->creators = $creators;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext(EventSummary $next)
    {
        $this->next = $next;
    }

    public function getPrevious()
    {
        return $this->previous;
    }

    public function setPrevious(EventSummary $previous)
    {
        $this->previous = $previous;
    }
}
