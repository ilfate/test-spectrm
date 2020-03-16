<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TestController
{
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
}