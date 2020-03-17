<?php
declare(strict_types=1);


namespace App\Domains\Weather\Services;


class WeatherService
{
    /**
     * @var WeatherRepository
     */
    private $weatherRepository;
    /**
     * @var CitiesRepository
     */
    private $citiesRepository;

    public function __construct(
        CitiesRepository $citiesRepository,
        WeatherRepository $weatherRepository
    ) {

        $this->weatherRepository = $weatherRepository;
        $this->citiesRepository = $citiesRepository;
    }

    public function getAvgForBiggestCities(int $numberOfCities, \DateInterval $dateInterval)
    {
        $cities = $this->citiesRepository->getBiggetsCities($numberOfCities);
        $this->weatherRepository->getWeather($cities, $dateInterval);
    }
}