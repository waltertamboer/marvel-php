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

class Creator
{
    /**
     * The unique ID of the creator resource.
     *
     * @var int
     */
    private $id;

    /**
     * The first name of the creator.
     *
     * @var string
     */
    private $firstName;

    /**
     * The middle name of the creator.
     *
     * @var string
     */
    private $middleName;

    /**
     * The last name of the creator.
     *
     * @var string
     */
    private $lastName;

    /**
     * The suffix or honorific for the creator.
     *
     * @var string
     */
    private $suffix;

    /**
     * The full name of the creator (a space-separated concatenation of the above four fields).
     *
     * @var string
     */
    private $fullName;

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
    private $resourceURI;

    /**
     * A set of public web site URLs for the resource.
     *
     * @var Url[]
     */
    private $urls;

    /**
     * The representative image for this creator.
     *
     * @var Image
     */
    private $thumbnail;

    /**
     * A resource list containing the series which feature work by this creator.
     *
     * @var ResourceList
     */
    private $series;

    /**
     * A resource list containing the stories which feature work by this creator.
     *
     * @var ResourceList
     */
    private $stories;

    /**
     * A resource list containing the comics which feature work by this creator.
     *
     * @var ResourceList
     */
    private $comics;

    /**
     * A resource list containing the events which feature work by this creator.
     *
     * @var ResourceList
     */
    private $events;

    public function __construct()
    {
        $this->urls = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getMiddleName()
    {
        return $this->middleName;
    }

    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getSuffix()
    {
        return $this->suffix;
    }

    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified)
    {
        $this->modified = Utils::parseDateTime($modified);
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

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Image $thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    public function getSeries()
    {
        return $this->series;
    }

    public function setSeries(ResourceList $series)
    {
        $this->series = $series;
    }

    public function getStories()
    {
        return $this->stories;
    }

    public function setStories(ResourceList $stories)
    {
        $this->stories = $stories;
    }

    public function getComics()
    {
        return $this->comics;
    }

    public function setComics(ResourceList $comics)
    {
        $this->comics = $comics;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function setEvents(ResourceList $events)
    {
        $this->events = $events;
    }
}
