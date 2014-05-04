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

class Story
{
    /**
     * The unique ID of the story resource.
     *
     * @var int
     */
    private $id;

    /**
     * The story title.
     *
     * @var string
     */
    private $title;

    /**
     * A short description of the story.
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
     * The story type e.g. interior story, cover, text story.
     *
     * @var string
     */
    private $type;

    /**
     * The date the resource was most recently modified.
     *
     * @var DateTime
     */
    private $modified;

    /**
     * The representative image for this story.
     *
     * @var Image
     */
    private $thumbnail;

    /**
     * A resource list containing comics in which this story takes place.
     *
     * @var ResourceList
     */
    private $comics;

    /**
     * A resource list containing series in which this story appears.
     *
     * @var ResourceList
     */
    private $series;

    /**
     * A resource list of the events in which this story appears.
     *
     * @var ResourceList
     */
    private $events;

    /**
     * A resource list of characters which appear in this story.
     *
     * @var ResourceList
     */
    private $characters;

    /**
     * A resource list of creators who worked on this story.
     *
     * @var ResourceList
     */
    private $creators;

    /**
     * A summary representation of the issue in which this story was originally published.
     *
     * @var ComicSummary
     */
    private $originalissue;

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

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
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

    public function setThumbnail(Image $thumbnail = null)
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

    public function getSeries()
    {
        return $this->series;
    }

    public function setSeries(ResourceList $series)
    {
        $this->series = $series;
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

    public function getOriginalissue()
    {
        return $this->originalissue;
    }

    public function setOriginalissue(ComicSummary $originalissue)
    {
        $this->originalissue = $originalissue;
    }
}
