<?php
namespace App\Controller;

use App\Service\WeatherService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Movie controller.
 * @Route("/", name="weather_")
 */

class WeatherController extends AbstractFOSRestController
{
    /**
     * @var WeatherService
     */
    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Get citi weather.
     * @Rest\Get("/weather/{citiName}")
     *
     * @return Response
     */
    public function getWeatherAction(string $citiName) : array
    {
        $data = $this->weatherService->getWeatherByCitiName($citiName);

        return $data;
    }

}