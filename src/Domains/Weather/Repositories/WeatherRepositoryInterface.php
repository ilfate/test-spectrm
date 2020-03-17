<?php
declare(strict_types=1);


namespace App\Domains\Weather\Repositories;


interface WeatherRepositoryInterface
{
    /**
     * @param CitiesEntity[] $citiesEntities
     * @return mixed
     */
    public function getWeather(array $citiesEntities, \DateInterval $dateInterval): CitiesEntity[];
}