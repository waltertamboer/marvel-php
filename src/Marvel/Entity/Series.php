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
use Marvel\Entity\ResourceList;
use Marvel\Entity\SeriesSummary;
use Marvel\Utils;

class Series
{
    /**
     * The unique ID of the series resource.
     *
     * @var int
     */
    private $id;

    /**
     * The canonical title of the series.
     *
     * @var string
     */
    private $title;

    /**
     * A description of the series.
     *
     * @var string
     * */
    private $description;

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
     * The first year of publication for the series.
     *
     * @var int
     */
    private $startYear;

    /**
     * The last year of publication for the series (conventionally, 2099 for ongoing series).
     *
     * @var int
     */
    private $endYear;

    /**
     * The age-appropriateness rating for the series.
     *
     * @var string
     */
    private $rating;

    /**
     * The date the resource was most recently modified.
     *
     * @var DateTime
     */
    private $modified;

    /**
     * The representative image for this series.
     *
     * @var Image
     */
    private $thumbnail;

    /**
     * A resource list containing comics in this series.
     *
     * @var ResourceList
     */
    private $comics;

    /**
     * A resource list containing stories which occur in comics in this series.
     *
     * @var ResourceList
     */
    private $stories;

    /**
     * A resource list containing events which take place in comics in this series.
     *
     * @var ResourceList
     */
    private $events;

    /**
     * A resource list containing characters which appear in comics in this series.
     *
     * @var ResourceList
     */
    private $characters;

    /**
     * A resource list of creators whose work appears in comics in this series.
     *
     * @var ResourceList
     */
    private $creators;

    /**
     * A summary representation of the series which follows this series.
     *
     * @var SeriesSummary
     */
    private $next;

    /**
     * A summary representation of the series which preceded this series.
     *
     * @var SeriesSummary
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

    public function getStartYear()
    {
        return $this->startYear;
    }

    public function setStartYear($startYear)
    {
        $this->startYear = $startYear;
    }

    public function getEndYear()
    {
        return $this->endYear;
    }

    public function setEndYear($endYear)
    {
        $this->endYear = $endYear;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified)
    {
        $this->modified = Utils::parseDateTime($modified);
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

    public function setNext(SeriesSummary $next = null)
    {
        $this->next = $next;
    }

    public function getPrevious()
    {
        return $this->previous;
    }

    public function setPrevious(SeriesSummary $previous = null)
    {
        $this->previous = $previous;
    }
}
