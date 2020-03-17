<?php
declare(strict_types=1);


namespace App\Domains\Weather\Repositories;


use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\DependencyInjection\Configuration;

class OpenWeatherMapWeatherRepository implements WeatherRepositoryInterface
{
    /**
     * @var Client
     */
    private $guzzleClient;
    /**
     * @var Configuration
     */
    private $config;

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $guzzleClient, Configuration $config)
    {
        $this->guzzleClient = $guzzleClient;
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function getWeather(CitiesCollection $citiesEntities, \DateInterval $dateInterval): CitiesCollection
    {
        $key = $this->config->get('api.openmaps.key');
        foreach ($citiesEntities as $entity) {


            $response = $this->guzzleClient->request(
                'GET',
                $this->config->get('api.openmaps.baseURI') . '/?id=' . $entity->getId() . '&appid=' . $key
            );
            $responceData = json_decode($response->getBody()->getContents(), true);

            // validations step
            $cityForcasts = [];
            foreach ($responceData['list'] as $forcast) {
                /// filter by $forcast['dt']
                $cityForcasts[] = $this->convertToCelsies($forcast['main']['temp']);
            }
            $cityAvr = array_sum($cityForcasts) / count($cityForcasts);
            $entity->setAvrTemprature = $cityAvr;
        }
        return $citiesEntities;
    }
}