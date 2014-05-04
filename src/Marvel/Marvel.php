<?php
/**
 * Marvel PHP (http://github.com/waltertamboer/marvel-php)
 *
 * @link      http://github.com/waltertamboer/marvel-php for the canonical source repository
 * @copyright Copyright (c) 2014 Walter Tamboer. (http://www.waltertamboer.nl)
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Marvel;

use Marvel\DataHandler\HandlerInterface;
use Marvel\Exception\AuthenticationException;
use Marvel\Exception\InvalidResponseException;
use Marvel\Exception\ResourceNotFoundException;
use Marvel\Request\RequestFactoryInterface;
use Marvel\Response\HttpResponse;

/**
 * The Marvel API client.
 */
class Marvel
{
    /**
     * The request factory that is used to create a request.
     *
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    /**
     * The base uri of the API.
     *
     * @var string
     */
    private $baseUri;

    /**
     * The public key used to create an API request.
     *
     * @var string
     */
    private $publicKey;

    /**
     * The private key used to create an API request.
     *
     * @var string
     */
    private $privateKey;

    /**
     * The content handler.
     *
     * @var HandlerInterface
     */
    private $contentHandler;

    /**
     * Initializes a new instance of this class.
     *
     * @param RequestFactoryInterface $requestFactory The request factory used to do requests.
     * @param string $publicKey The public key used to create an API request.
     * @param string $privateKey The private key used to create an API request.
     */
    public function __construct(RequestFactoryInterface $requestFactory, $publicKey, $privateKey)
    {
        $this->requestFactory = $requestFactory;
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
        $this->baseUri = 'http://gateway.marvel.com/v1/public';
        $this->contentHandler = new DataHandler\JsonHandler();
    }

    /**
     * Gets the base uri.
     *
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * Sets the base uri.
     *
     * @param string $baseUri The uri used to do requests on.
     */
    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
    }

    /**
     * Gets the public key.
     *
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * Gets the private key.
     *
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * Gets all the available characters.
     *
     * @param Query\QueryInterface $query The query parameters.
     * @return CharacterDataWrapper
     */
    public function getCharacters(Query\QueryInterface $query)
    {
        $url = '/characters';

        $response = $this->request($url, $query->getParams());

        return $this->contentHandler->getCharacterDataWrapper($response);
    }

    /**
     * Gets the character with a given id.
     *
     * @param int $characterId The id of the character to get.
     * @return Character
     */
    public function getCharacter($characterId)
    {
        $url = '/characters/' . $characterId;

        $response = $this->request($url);

        $dataWrapper = $this->contentHandler->getCharacterDataWrapper($response);

        return $dataWrapper->getData()->get(0);
    }

    /**
     * Gets the comics of the character with the given id.
     *
     * @param int $characterId The id of the character to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return ComicDataWrapper
     */
    public function getCharacterComics($characterId, Query\QueryInterface $query)
    {
        $url = '/characters/' . $characterId . '/comics';

        $response = $this->request($url, $query->getParams());

        return $this->contentHandler->getComicDataWrapper($response);
    }

    /**
     * Gets the events of the character with the given id.
     *
     * @param int $characterId The id of the character to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return EventDataWrapper
     */
    public function getCharacterEvents($characterId, Query\QueryInterface $query)
    {
        $url = '/characters/' . $characterId . '/events';

        $response = $this->request($url, $query->getParams());

        return $this->contentHandler->getEventDataWrapper($response);
    }

    /**
     * Gets the series of the character with the given id.
     *
     * @param int $characterId The id of the character to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return SeriesDataWrapper
     */
    public function getCharacterSeries($characterId, Query\QueryInterface $request)
    {
        $url = '/characters/' . $characterId . '/series';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getSeriesDataWrapper($response);
    }

    /**
     * Gets the stories of the character with the given id.
     *
     * @param int $characterId The id of the character to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return StoryDataWrapper
     */
    public function getCharacterStories($characterId, Query\QueryInterface $request)
    {
        $url = '/characters/' . $characterId . '/stories';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getStoryDataWrapper($response);
    }

    /**
     * Gets all the available comics.
     *
     * @param Query\QueryInterface $query The query parameters.
     * @return ComicDataWrapper
     */
    public function getComics(Query\QueryInterface $request)
    {
        $url = '/comics';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getComicDataWrapper($response);
    }

    /**
     * Gets the comic with a given id.
     *
     * @param int $comicId The id of the comic to get.
     * @return Comic
     */
    public function getComic($comicId)
    {
        $url = '/comics/' . $comicId;

        $response = $this->request($url);

        $dataWrapper = $this->contentHandler->getComicDataWrapper($response);

        return $dataWrapper->getData()->get(0);
    }

    /**
     * Gets the characters of the comic with the given id.
     *
     * @param int $comicId The id of the comic to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return CharacterDataWrapper
     */
    public function getComicCharacters($comicId, Query\QueryInterface $request)
    {
        $url = '/comics/' . $comicId . '/characters';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getCharacterDataWrapper($response);
    }

    /**
     * Gets the creators of the comic with the given id.
     *
     * @param int $comicId The id of the comic to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return CreatorDataWrapper
     */
    public function getComicCreators($comicId, Query\QueryInterface $request)
    {
        $url = '/comics/' . $comicId . '/creators';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getCreatorDataWrapper($response);
    }

    /**
     * Gets the events of the comic with the given id.
     *
     * @param int $comicId The id of the comic to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return EventDataWrapper
     */
    public function getComicEvents($comicId, Query\QueryInterface $request)
    {
        $url = '/comics/' . $comicId . '/events';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getEventDataWrapper($response);
    }

    /**
     * Gets the stories of the comic with the given id.
     *
     * @param int $comicId The id of the comic to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return StoryDataWrapper
     */
    public function getComicStories($comicId, Query\QueryInterface $request)
    {
        $url = '/comics/' . $comicId . '/stories';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getSeriesDataWrapper($response);
    }

    /**
     * Gets all the available creators.
     *
     * @param Query\QueryInterface $query The query parameters.
     * @return CreatorDataWrapper
     */
    public function getCreators(Query\QueryInterface $request)
    {
        $url = '/creators';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getCreatorDataWrapper($response);
    }

    /**
     * Gets the creator with a given id.
     *
     * @param int $creatorId The id of the creator to get.
     * @return Creator
     */
    public function getCreator($creatorId)
    {
        $url = '/creators/' . $creatorId;

        $response = $this->request($url);

        $dataWrapper = $this->contentHandler->getCreatorDataWrapper($response);

        return $dataWrapper->getData()->get(0);
    }

    /**
     * Gets the comics of the creator with the given id.
     *
     * @param int $creatorId The id of the creator to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return ComicDataWrapper
     */
    public function getCreatorComics($creatorId, Query\QueryInterface $request)
    {
        $url = '/creators/' . $creatorId . '/comics';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getComicDataWrapper($response);
    }

    /**
     * Gets the events of the creator with the given id.
     *
     * @param int $creatorId The id of the creator to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return EventDataWrapper
     */
    public function getCreatorEvents($creatorId, Query\QueryInterface $request)
    {
        $url = '/creators/' . $creatorId . '/events';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getEventDataWrapper($response);
    }

    /**
     * Gets the series of the creator with the given id.
     *
     * @param int $creatorId The id of the creator to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return SeriesDataWrapper
     */
    public function getCreatorSeries($creatorId, Query\QueryInterface $request)
    {
        $url = '/creators/' . $creatorId . '/series';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getSeriesDataWrapper($response);
    }

    /**
     * Gets the stories of the creator with the given id.
     *
     * @param int $creatorId The id of the creator to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return StoryDataWrapper
     */
    public function getCreatorStories($creatorId, Query\QueryInterface $request)
    {
        $url = '/creators/' . $creatorId . '/stories';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getStoryDataWrapper($response);
    }

    /**
     * Gets all the available events.
     *
     * @param Query\QueryInterface $query The query parameters.
     * @return EventDataWrapper
     */
    public function getEvents(Query\QueryInterface $request)
    {
        $url = '/events';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getEventDataWrapper($response);
    }

    /**
     * Gets the event with a given id.
     *
     * @param int $eventId The id of the event to get.
     * @return Event
     */
    public function getEvent($eventId)
    {
        $url = '/events/' . $eventId;

        $response = $this->request($url);

        $dataWrapper = $this->contentHandler->getEventDataWrapper($response);

        return $dataWrapper->getData()->get(0);
    }

    /**
     * Gets the characters of the event with the given id.
     *
     * @param int $eventId The id of the event to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return CharacterDataWrapper
     */
    public function getEventCharacters($eventId, Query\QueryInterface $request)
    {
        $url = '/events/' . $eventId . '/characters';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getCharacterDataWrapper($response);
    }

    /**
     * Gets the comics of the event with the given id.
     *
     * @param int $eventId The id of the event to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return ComicDataWrapper
     */
    public function getEventComics($eventId, Query\QueryInterface $request)
    {
        $url = '/events/' . $eventId . '/comics';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getComicDataWrapper($response);
    }

    /**
     * Gets the creators of the event with the given id.
     *
     * @param int $eventId The id of the event to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return CreatorDataWrapper
     */
    public function getEventCreators($eventId, Query\QueryInterface $request)
    {
        $url = '/events/' . $eventId . '/creators';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getCreatorDataWrapper($response);
    }

    /**
     * Gets the series of the event with the given id.
     *
     * @param int $eventId The id of the event to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return SeriesDataWrapper
     */
    public function getEventSeries($eventId, Query\QueryInterface $request)
    {
        $url = '/events/' . $eventId . '/series';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getSeriesDataWrapper($response);
    }

    /**
     * Gets the stories of the event with the given id.
     *
     * @param int $eventId The id of the event to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return StoryDataWrapper
     */
    public function getEventStories($eventId, Query\QueryInterface $request)
    {
        $url = '/events/' . $eventId . '/stories';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getStoryDataWrapper($response);
    }

    /**
     * Gets all the available series.
     *
     * @param Query\QueryInterface $query The query parameters.
     * @return SeriesDataWrapper
     */
    public function getSeriesCollection(Query\QueryInterface $request)
    {
        $url = '/series';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getSeriesDataWrapper($response);
    }

    /**
     * Gets the series with a given id.
     *
     * @param int $seriesId The id of the series to get.
     * @return Series
     */
    public function getSeries($seriesId)
    {
        $url = '/series/' . $seriesId;

        $response = $this->request($url);

        $dataWrapper = $this->contentHandler->getSeriesDataWrapper($response);

        return $dataWrapper->getData()->get(0);
    }

    /**
     * Gets the characters of the series with the given id.
     *
     * @param int $seriesId The id of the series to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return CharacterDataWrapper
     */
    public function getSeriesCharacters($seriesId, Query\QueryInterface $request)
    {
        $url = '/series/' . $seriesId . '/characters';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getCharacterDataWrapper($response);
    }

    /**
     * Gets the comics of the series with the given id.
     *
     * @param int $seriesId The id of the series to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return ComicDataWrapper
     */
    public function getSeriesComics($seriesId, Query\QueryInterface $request)
    {
        $url = '/series/' . $seriesId . '/comics';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getComicDataWrapper($response);
    }

    /**
     * Gets the creators of the series with the given id.
     *
     * @param int $seriesId The id of the series to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return CreatorDataWrapper
     */
    public function getSeriesCreators($seriesId, Query\QueryInterface $request)
    {
        $url = '/series/' . $seriesId . '/creators';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getCreatorDataWrapper($response);
    }

    /**
     * Gets the events of the series with the given id.
     *
     * @param int $seriesId The id of the series to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return EventDataWrapper
     */
    public function getSeriesEvents($seriesId, Query\QueryInterface $request)
    {
        $url = '/series/' . $seriesId . '/events';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getEventDataWrapper($response);
    }

    /**
     * Gets the stories of the series with the given id.
     *
     * @param int $seriesId The id of the series to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return StoryDataWrapper
     */
    public function getSeriesStories($seriesId, Query\QueryInterface $request)
    {
        $url = '/series/' . $seriesId . '/stories';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getStoryDataWrapper($response);
    }

    /**
     * Gets all the available stories.
     *
     * @param Query\QueryInterface $query The query parameters.
     * @return StoryDataWrapper
     */
    public function getStories(Query\QueryInterface $request)
    {
        $url = '/stories';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getStoryDataWrapper($response);
    }

    /**
     * Gets the story with a given id.
     *
     * @param int $storyId The id of the story to get.
     * @return Story
     */
    public function getStory($storyId)
    {
        $url = '/stories/' . $storyId;

        $response = $this->request($url);

        $dataWrapper = $this->contentHandler->getStoryDataWrapper($response);

        return $dataWrapper->getData()->get(0);
    }

    /**
     * Gets the characters of the story with the given id.
     *
     * @param int $storyId The id of the story to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return CharacterDataWrapper
     */
    public function getStoryCharacters($storyId, Query\QueryInterface $request)
    {
        $url = '/stories/' . $storyId . '/characters';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getCharacterDataWrapper($response);
    }

    /**
     * Gets the comics of the story with the given id.
     *
     * @param int $storyId The id of the story to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return ComicDataWrapper
     */
    public function getStoryComics($storyId, Query\QueryInterface $request)
    {
        $url = '/stories/' . $storyId . '/comics';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getComicDataWrapper($response);
    }

    /**
     * Gets the creators of the story with the given id.
     *
     * @param int $storyId The id of the story to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return CreatorDataWrapper
     */
    public function getStoryCreators($storyId, Query\QueryInterface $request)
    {
        $url = '/stories/' . $storyId . '/creators';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getCreatorDataWrapper($response);
    }

    /**
     * Gets the events of the story with the given id.
     *
     * @param int $storyId The id of the story to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return EventDataWrapper
     */
    public function getStoryEvents($storyId, Query\QueryInterface $request)
    {
        $url = '/stories/' . $storyId . '/events';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getEventDataWrapper($response);
    }

    /**
     * Gets the series of the story with the given id.
     *
     * @param int $storyId The id of the story to search for.
     * @param Query\QueryInterface $query The query parameters.
     * @return SeriesDataWrapper
     */
    public function getStorySeries($storyId, Query\QueryInterface $request)
    {
        $url = '/stories/' . $storyId . '/series';

        $response = $this->request($url, $request->getParams());

        return $this->contentHandler->getSeriesDataWrapper($response);
    }

    /**
     * Do a HTTP request
     *
     * @param string $url The URL to do the request on.
     * @param array $params The parameters to pass to the request.
     * @return HttpResponse The HTTP response.
     * @throws InvalidResponseException
     * @throws AuthenticationException
     * @throws ResourceNotFoundException
     */
    private function request($url, array $params = array())
    {
        $timestamp = time();
        $hash = md5($timestamp . $this->getPrivateKey() . $this->getPublicKey());

        $params['ts'] = $timestamp;
        $params['apikey'] = $this->getPublicKey();
        $params['hash'] = $hash;

        $request = $this->requestFactory->create();
        foreach ($params as $name => $value) {
            $request->setParam($name, $value);
        }

        $request->setUrl($this->getBaseUri() . $url);

        $response = $request->execute();
        if (!$response instanceof HttpResponse) {
            throw new InvalidResponseException($response);
        }

        switch ($response->getCode()) {
            case 200:
                break;

            case 401:
            case 403:
            case 405:
            case 409:
                throw new AuthenticationException($response);

            case 404:
                throw new ResourceNotFoundException($response);
        }

        return $response;
    }
}
