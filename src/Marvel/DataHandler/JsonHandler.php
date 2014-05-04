<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel\DataHandler;

use Marvel\DataWrapper;
use Marvel\DataContainer;
use Marvel\Entity;
use Marvel\Response\HttpResponse;
use stdClass;

class JsonHandler implements HandlerInterface
{
    public function getCharacterDataWrapper(HttpResponse $response)
    {
        $jsonObject = $response->getJsonObject();

        $dataContainer = new DataContainer\CharacterDataContainer();
        $this->initializeDataContainer($dataContainer, $jsonObject->data);

        $dataWrapper = new DataWrapper\CharacterDataWrapper();
        $dataWrapper->setData($dataContainer);
        $this->initializeDataWrapper($dataWrapper, $jsonObject);

        foreach ($jsonObject->data->results as $dataObject) {
            $item = new Entity\Character();
            $item->setId($dataObject->id);
            $item->setName($dataObject->name);
            $item->setDescription($dataObject->description);
            $item->setModified($dataObject->modified);
            $item->setResourceUri($dataObject->resourceURI);
            $item->setThumbnail($this->parseImage($dataObject->thumbnail));
            $item->setUrls($this->parseUrls($dataObject->urls));
            $item->setComics($this->parseComics($dataObject->comics));
            $item->setStories($this->parseStories($dataObject->stories));
            $item->setEvents($this->parseEvents($dataObject->events));
            $item->setSeries($this->parseSeries($dataObject->series));

            $dataContainer->add($item);
        }

        return $dataWrapper;
    }

    public function getComicDataWrapper(HttpResponse $response)
    {
        $jsonObject = $response->getJsonObject();

        $dataContainer = new DataContainer\ComicDataContainer();
        $this->initializeDataContainer($dataContainer, $jsonObject->data);

        $dataWrapper = new DataWrapper\ComicDataWrapper();
        $dataWrapper->setData($dataContainer);
        $this->initializeDataWrapper($dataWrapper, $jsonObject);

        foreach ($jsonObject->data->results as $dataObject) {
            $item = new Entity\Comic();
            $item->setId($dataObject->id);
            $item->setDigitalId($dataObject->digitalId);
            $item->setTitle($dataObject->title);
            $item->setIssueNumber($dataObject->issueNumber);
            $item->setVariantDescription($dataObject->variantDescription);
            $item->setDescription($dataObject->description);
            $item->setModified($dataObject->modified);
            $item->setIsbn($dataObject->isbn);
            $item->setUpc($dataObject->upc);
            $item->setDiamondCode($dataObject->diamondCode);
            $item->setEan($dataObject->ean);
            $item->setIssn($dataObject->issn);
            $item->setFormat($dataObject->format);
            $item->setPageCount($dataObject->pageCount);
            $item->setResourceURI($dataObject->resourceURI);
            $item->setSeries($this->parseSeriesSummary($dataObject->series));
            $item->setThumbnail($this->parseImage($dataObject->thumbnail));
            $item->setUrls($this->parseUrls($dataObject->urls));
            $item->setTextObjects($this->parseTextObjects($dataObject->textObjects));
            $item->setVariants($this->parseVariants($dataObject->variants));
            $item->setCollections($this->parseCollections($dataObject->collections));
            $item->setCollectedIssues($this->parseCollectedIssues($dataObject->collectedIssues));
            $item->setDates($this->parseDates($dataObject->dates));
            $item->setPrices($this->parseComicPrices($dataObject->prices));
            $item->setImages($this->parseImages($dataObject->images));
            $item->setCreators($this->parseCreators($dataObject->creators));
            $item->setCharacters($this->parseCharacters($dataObject->characters));
            $item->setStories($this->parseStories($dataObject->stories));
            $item->setEvents($this->parseEvents($dataObject->events));

            $dataContainer->add($item);
        }

        return $dataWrapper;
    }

    public function getCreatorDataWrapper(HttpResponse $response)
    {
        $jsonObject = $response->getJsonObject();

        $dataContainer = new DataContainer\CreatorDataContainer();
        $this->initializeDataContainer($dataContainer, $jsonObject->data);

        $dataWrapper = new DataWrapper\CreatorDataWrapper();
        $dataWrapper->setData($dataContainer);
        $this->initializeDataWrapper($dataWrapper, $jsonObject);

        foreach ($jsonObject->data->results as $dataObject) {
            $item = new Entity\Creator();
            $item->setId($dataObject->id);
            $item->setFirstName($dataObject->firstName);
            $item->setMiddleName($dataObject->middleName);
            $item->setLastName($dataObject->lastName);
            $item->setSuffix($dataObject->suffix);
            $item->setFullName($dataObject->fullName);
            $item->setModified($dataObject->modified);
            $item->setResourceURI($dataObject->resourceURI);
            $item->setUrls($this->parseUrls($dataObject->urls));
            $item->setThumbnail($this->parseImage($dataObject->thumbnail));
            $item->setSeries($this->parseSeries($dataObject->series));
            $item->setStories($this->parseStories($dataObject->stories));
            $item->setComics($this->parseComics($dataObject->comics));
            $item->setEvents($this->parseEvents($dataObject->events));

            $dataContainer->add($item);
        }

        return $dataWrapper;
    }

    public function getEventDataWrapper(HttpResponse $response)
    {
        $jsonObject = $response->getJsonObject();

        $dataContainer = new DataContainer\EventDataContainer();
        $this->initializeDataContainer($dataContainer, $jsonObject->data);

        $dataWrapper = new DataWrapper\EventDataWrapper();
        $dataWrapper->setData($dataContainer);
        $this->initializeDataWrapper($dataWrapper, $jsonObject);

        foreach ($jsonObject->data->results as $dataObject) {
            $item = new Entity\Event();
            $item->setId($dataObject->id);
            $item->setTitle($dataObject->title);
            $item->setDescription($dataObject->description);
            $item->setResourceURI($dataObject->resourceURI);
            $item->setUrls($this->parseUrls($dataObject->urls));
            $item->setModified($dataObject->modified);
            $item->setStart($dataObject->start);
            $item->setEnd($dataObject->end);
            $item->setThumbnail($this->parseImage($dataObject->thumbnail));
            $item->setComics($this->parseComics($dataObject->comics));
            $item->setStories($this->parseStories($dataObject->stories));
            $item->setSeries($this->parseSeries($dataObject->series));
            $item->setCharacters($this->parseCharacters($dataObject->characters));
            $item->setCreators($this->parseCreators($dataObject->creators));
            $item->setNext($this->parseEventSummary($dataObject->next));
            $item->setPrevious($this->parseEventSummary($dataObject->previous));

            $dataContainer->add($item);
        }

        return $dataWrapper;
    }

    public function getSeriesDataWrapper(HttpResponse $response)
    {
        $jsonObject = $response->getJsonObject();

        $dataContainer = new DataContainer\SeriesDataContainer();
        $this->initializeDataContainer($dataContainer, $jsonObject->data);

        $dataWrapper = new DataWrapper\SeriesDataWrapper();
        $dataWrapper->setData($dataContainer);
        $this->initializeDataWrapper($dataWrapper, $jsonObject);

        foreach ($jsonObject->data->results as $dataObject) {
            $item = new Entity\Series();
            $item->setId($dataObject->id);
            $item->setTitle($dataObject->title);
            $item->setDescription($dataObject->description);
            $item->setResourceURI($dataObject->resourceURI);
            $item->setUrls($this->parseUrls($dataObject->urls));
            $item->setStartYear($dataObject->startYear);
            $item->setEndYear($dataObject->endYear);
            $item->setRating($dataObject->rating);
            $item->setModified($dataObject->modified);
            $item->setThumbnail($this->parseImage($dataObject->thumbnail));
            $item->setComics($this->parseComics($dataObject->comics));
            $item->setStories($this->parseStories($dataObject->stories));
            $item->setEvents($this->parseEvents($dataObject->events));
            $item->setCharacters($this->parseCharacters($dataObject->characters));
            $item->setCreators($this->parseCreators($dataObject->creators));
            $item->setNext($this->parseSeriesSummary($dataObject->next));
            $item->setPrevious($this->parseSeriesSummary($dataObject->previous));

            $dataContainer->add($item);
        }

        return $dataWrapper;
    }

    public function getStoryDataWrapper(HttpResponse $response)
    {
        $jsonObject = $response->getJsonObject();

        $dataContainer = new DataContainer\StoryDataContainer();
        $this->initializeDataContainer($dataContainer, $jsonObject->data);

        $dataWrapper = new DataWrapper\StoryDataWrapper();
        $dataWrapper->setData($dataContainer);
        $this->initializeDataWrapper($dataWrapper, $jsonObject);

        foreach ($jsonObject->data->results as $dataObject) {
            $item = new Entity\Story();
            $item->setId($dataObject->id);
            $item->setTitle($dataObject->title);
            $item->setDescription($dataObject->description);
            $item->setResourceURI($dataObject->resourceURI);
            $item->setType($dataObject->type);
            $item->setModified($dataObject->modified);
            $item->setThumbnail($this->parseImage($dataObject->thumbnail));
            $item->setComics($this->parseComics($dataObject->comics));
            $item->setSeries($this->parseSeries($dataObject->series));
            $item->setEvents($this->parseEvents($dataObject->events));
            $item->setCharacters($this->parseCharacters($dataObject->characters));
            $item->setCreators($this->parseCreators($dataObject->creators));
            $item->setOriginalissue($this->parseComicSummary($dataObject->originalIssue));

            $dataContainer->add($item);
        }

        return $dataWrapper;
    }

    private function initializeDataContainer(DataContainer\AbstractDataContainer $dataContainer, stdClass $jsonObject)
    {
        $dataContainer->setCount($jsonObject->count);
        $dataContainer->setLimit($jsonObject->limit);
        $dataContainer->setOffset($jsonObject->offset);
        $dataContainer->setTotal($jsonObject->total);
    }

    private function initializeDataWrapper(DataWrapper\AbstractDataWrapper $dataWrapper, stdClass $jsonObject)
    {
        $dataWrapper->setCode($jsonObject->code);
        $dataWrapper->setStatus($jsonObject->status);
        $dataWrapper->setCopyright($jsonObject->copyright);
        $dataWrapper->setAttributionHTML($jsonObject->attributionHTML);
        $dataWrapper->setAttributionText($jsonObject->attributionText);
        $dataWrapper->setEtag($jsonObject->etag);
    }

    private function parseCharacterSummary(stdClass $jsonObject)
    {
        $role = isset($jsonObject->role) ? $jsonObject->role : null;

        return new Entity\CharacterSummary($jsonObject->resourceURI, $jsonObject->name, $role);
    }

    private function parseCollections(array $entries)
    {
        $result = array();
        foreach ($entries as $jsonObject) {
            $result[] = $this->parseComicSummary($jsonObject);
        }
        return $result;
    }

    private function parseCollectedIssues(array $entries)
    {
        $result = array();
        foreach ($entries as $jsonObject) {
            $result[] = $this->parseComicSummary($jsonObject);
        }
        return $result;
    }

    private function parseComicDate(stdClass $jsonObject)
    {
        return new Entity\ComicDate($jsonObject->type, $jsonObject->date);
    }

    private function parseComicPrice(stdClass $jsonObject)
    {
        return new Entity\ComicPrice($jsonObject->type, $jsonObject->price);
    }

    private function parseComicPrices(array $entries)
    {
        $result = array();
        foreach ($entries as $jsonObject) {
            $result[] = $this->parseComicPrice($jsonObject);
        }
        return $result;
    }

    private function parseComics(stdClass $jsonObject)
    {
        $items = array();
        foreach ($jsonObject->items as $entry) {
            $items[] = $this->parseComicSummary($entry);
        }

        $resourceList = $this->parseResourceList($jsonObject);
        $resourceList->setItems($items);
        return $resourceList;
    }

    private function parseCharacters(stdClass $jsonObject)
    {
        $items = array();
        foreach ($jsonObject->items as $item) {
            $items[] = $this->parseCharacterSummary($item);
        }

        $resourceList = $this->parseResourceList($jsonObject);
        $resourceList->setItems($items);
        return $resourceList;
    }

    private function parseComicSummary(stdClass $jsonObject)
    {
        return new Entity\ComicSummary($jsonObject->resourceURI, $jsonObject->name);
    }

    private function parseCreators(stdClass $jsonObject)
    {
        $items = array();
        foreach ($jsonObject->items as $item) {
            $items[] = $this->parseCreatorSummary($item);
        }

        $resourceList = $this->parseResourceList($jsonObject);
        $resourceList->setItems($items);
        return $resourceList;
    }

    private function parseCreatorSummary(stdClass $jsonObject)
    {
        return new Entity\CreatorSummary($jsonObject->resourceURI, $jsonObject->name, $jsonObject->role);
    }

    private function parseDates(array $entries)
    {
        $result = array();
        foreach ($entries as $jsonObject) {
            $result[] = $this->parseComicDate($jsonObject);
        }
        return $result;
    }

    private function parseEvents(stdClass $jsonObject)
    {
        $items = array();
        foreach ($jsonObject->items as $item) {
            $items[] = $this->parseEventSummary($item);
        }

        $resourceList = $this->parseResourceList($jsonObject);
        $resourceList->setItems($items);
        return $resourceList;
    }

    private function parseEventSummary(stdClass $jsonObject)
    {
        return new Entity\EventSummary($jsonObject->resourceURI, $jsonObject->name);
    }

    private function parseImage(stdClass $jsonObject = null)
    {
        if (!$jsonObject) {
            return null;
        }
        return new Entity\Image($jsonObject->path, $jsonObject->extension);
    }

    private function parseImages(array $entries)
    {
        $result = array();
        foreach ($entries as $jsonObject) {
            $result[] = $this->parseImage($jsonObject);
        }
        return $result;
    }

    private function parseResourceList(stdClass $jsonObject)
    {
        $resourceList = new Entity\ResourceList();
        $resourceList->setAvailable($jsonObject->available);
        $resourceList->setReturned($jsonObject->returned);
        $resourceList->setCollectionURI($jsonObject->collectionURI);
        return $resourceList;
    }

    private function parseSeries(stdClass $jsonObject)
    {
        $items = array();
        foreach ($jsonObject->items as $item) {
            $items[] = $this->parseSeriesSummary($item);
        }

        $resourceList = $this->parseResourceList($jsonObject);
        $resourceList->setItems($items);
        return $resourceList;
    }

    private function parseSeriesSummary(stdClass $jsonObject = null)
    {
        if (!$jsonObject) {
            return null;
        }
        return new Entity\SeriesSummary($jsonObject->resourceURI, $jsonObject->name);
    }

    private function parseStories(stdClass $jsonObject)
    {
        $items = array();
        foreach ($jsonObject->items as $item) {
            $items[] = $this->parseStorySummary($item);
        }

        $resourceList = $this->parseResourceList($jsonObject);
        $resourceList->setItems($items);
        return $resourceList;
    }

    private function parseStorySummary(stdClass $jsonObject)
    {
        return new Entity\StorySummary($jsonObject->resourceURI, $jsonObject->name, $jsonObject->type);
    }

    private function parseTextObject(stdClass $jsonObject)
    {
        return new Entity\TextObject($jsonObject->type, $jsonObject->language, $jsonObject->text);
    }

    private function parseTextObjects(array $entries)
    {
        $result = array();
        foreach ($entries as $jsonObject) {
            $result[] = $this->parseTextObject($jsonObject);
        }
        return $result;
    }

    private function parseUrl(stdClass $jsonObject)
    {
        return new Entity\Url($jsonObject->type, $jsonObject->url);
    }

    private function parseUrls(array $entries)
    {
        $result = array();
        foreach ($entries as $jsonObject) {
            $result[] = $this->parseUrl($jsonObject);
        }
        return $result;
    }

    private function parseVariants(array $entries)
    {
        $result = array();
        foreach ($entries as $jsonObject) {
            $result[] = $this->parseComicSummary($jsonObject);
        }
        return $result;
    }
}
