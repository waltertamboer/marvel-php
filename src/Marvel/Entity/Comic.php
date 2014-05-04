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

class Comic
{
    /**
     * The unique ID of the comic resource.
     *
     * @var int
     */
    private $id;

    /**
     * The ID of the digital comic representation of this comic. Will be 0 if the comic is not
     * available digitally.
     *
     * @var int
     */
    private $digitalId;

    /**
     * The canonical title of the comic.
     *
     * @var string
     */
    private $title;

    /**
     * The number of the issue in the series (will generally be 0 for collection formats).
     *
     * @var double
     */
    private $issueNumber;

    /**
     * If the issue is a variant (e.g. an alternate cover, second printing, or director’s cut), a text description of the variant.
     *
     * @var string
     */
    private $variantDescription;

    /**
     * The preferred description of the comic.,
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
     * The ISBN for the comic (generally only populated for collection formats).
     *
     * @var string
     */
    private $isbn;

    /**
     * The UPC barcode number for the comic (generally only populated for periodical formats).
     *
     * @var string
     */
    private $upc;

    /**
     * The Diamond code for the comic.
     *
     * @var string
     */
    private $diamondCode;

    /**
     * The EAN barcode for the comic.
     *
     * @var string
     */
    private $ean;

    /**
     * The ISSN barcode for the comic.
     *
     * @var string
     */
    private $issn;

    /**
     * The publication format of the comic e.g. comic, hardcover, trade paperback.
     *
     * @var string
     */
    private $format;

    /**
     * The number of story pages in the comic.
     *
     * @var int
     */
    private $pageCount;

    /**
     * A set of descriptive text blurbs for the comic.
     *
     * @var TextObject[]
     */
    private $textObjects;

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
     * A summary representation of the series to which this comic belongs.
     *
     * @var SeriesSummary
     */
    private $series;

    /**
     * A list of variant issues for this comic (includes the "original" issue if the current
     * issue is a variant).
     *
     * @var ComicSummary[]
     */
    private $variants;

    /**
     * A list of collections which include this comic (will generally be empty if the comic's
     * format is a collection).
     *
     * @var ComicSummary[]
     */
    private $collections;

    /**
     * A list of issues collected in this comic (will generally be empty for periodical formats
     * such as "comic" or "magazine").
     *
     * @var ComicSummary[]
     */
    private $collectedIssues;

    /**
     * A list of key dates for this comic.
     *
     * @var ComicDate
     */
    private $dates;

    /**
     * A list of prices for this comic.
     *
     * @var ComicPrice[]
     */
    private $prices;

    /**
     * The representative image for this comic.
     *
     * @var Image
     */
    private $thumbnail;

    /**
     * A list of promotional images associated with this comic.
     *
     * @var Image[]
     */
    private $images;

    /**
     * A resource list containing the creators associated with this comic.
     *
     * @var ResourceList
     */
    private $creators;

    /**
     * A resource list containing the characters which appear in this comic.
     *
     * @var ResourceList
     */
    private $characters;

    /**
     * A resource list containing the stories which appear in this comic.
     *
     * @var ResourceList
     */
    private $stories;

    /**
     * A resource list containing the events in which this comic appears.
     *
     * @var ResourceList
     */
    private $events;

    /**
     * Initializes a new instance of this class.
     */
    public function __construct()
    {
        $this->textObjects = array();
        $this->urls = array();
        $this->variants = array();
        $this->collections = array();
        $this->collectedIssues = array();
        $this->prices = array();
        $this->images = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDigitalId()
    {
        return $this->digitalId;
    }

    public function setDigitalId($digitalId)
    {
        $this->digitalId = $digitalId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getIssueNumber()
    {
        return $this->issueNumber;
    }

    public function setIssueNumber($issueNumber)
    {
        $this->issueNumber = $issueNumber;
    }

    public function getVariantDescription()
    {
        return $this->variantDescription;
    }

    public function setVariantDescription($variantDescription)
    {
        $this->variantDescription = $variantDescription;
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

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function getUpc()
    {
        return $this->upc;
    }

    public function setUpc($upc)
    {
        $this->upc = $upc;
    }

    public function getDiamondCode()
    {
        return $this->diamondCode;
    }

    public function setDiamondCode($diamondCode)
    {
        $this->diamondCode = $diamondCode;
    }

    public function getEan()
    {
        return $this->ean;
    }

    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    public function getIssn()
    {
        return $this->issn;
    }

    public function setIssn($issn)
    {
        $this->issn = $issn;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function setFormat($format)
    {
        $this->format = $format;
    }

    public function getPageCount()
    {
        return $this->pageCount;
    }

    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }

    public function getTextObjects()
    {
        return $this->textObjects;
    }

    public function setTextObjects($textObjects)
    {
        $this->textObjects = $textObjects;
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

    public function getSeries()
    {
        return $this->series;
    }

    public function setSeries(SeriesSummary $series)
    {
        $this->series = $series;
    }

    public function getVariants()
    {
        return $this->variants;
    }

    public function setVariants($variants)
    {
        $this->variants = $variants;
    }

    public function getCollections()
    {
        return $this->collections;
    }

    public function setCollections($collections)
    {
        $this->collections = $collections;
    }

    public function getCollectedIssues()
    {
        return $this->collectedIssues;
    }

    public function setCollectedIssues($collectedIssues)
    {
        $this->collectedIssues = $collectedIssues;
    }

    public function getDates()
    {
        return $this->dates;
    }

    public function setDates($dates)
    {
        $this->dates = $dates;
    }

    public function getPrices()
    {
        return $this->prices;
    }

    public function setPrices($prices)
    {
        $this->prices = $prices;
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Image $thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }

    public function getCreators()
    {
        return $this->creators;
    }

    public function setCreators(ResourceList $creators)
    {
        $this->creators = $creators;
    }

    public function getCharacters()
    {
        return $this->characters;
    }

    public function setCharacters(ResourceList $characters)
    {
        $this->characters = $characters;
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
}
