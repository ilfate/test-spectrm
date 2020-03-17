<?php
declare(strict_types=1);

namespace App\Controller;

use App\Services\WeatherService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{

    /**
     * @var WeatherService
     */
    private $demoService;

    public function __construct(WeatherService $demoService)
    {
        $this->demoService = $demoService->;
    }

    public function number()
    {
        $number = random_int(0, 100);

        return new JsonResponse(
            [
                'status' => 'ok',
                'random' => $number
            ]
        );
    }

    /**
     * @Route("/api/test/{id}", methods={"POST"})
     */
    public function test2($id)
    {
        return new JsonResponse(
            [
                'status' => 'ok',
                'random' => $this->demoService->getString()
            ]
        );
    }
}