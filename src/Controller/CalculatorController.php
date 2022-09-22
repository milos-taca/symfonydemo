<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Services\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="api_")
 */
class CalculatorController extends AbstractController
{
    //test
    private $service;

    public function __construct(Calculator $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/triangle/{a}/{b}/{c}", name="triangle_calc", methods={"GET"})
     */
    public function calculateTriangle($a, $b, $c): Response
    {
        $triangle = new Triangle();
        $triangle->setA($a);
        $triangle->setB($b);
        $triangle->setC($c);
        $surface = $triangle->getSurface();
        $circumference = $triangle->getCircumference();
        $data =  new \StdClass();
        $data->type = "triangle";
        $data->a = $a;
        $data->b = $b;
        $data->c = $c;
        $data->surface = $surface;
        $data->circumference = $circumference;

        return $this->json($data);
    }

    /**
     * @Route("/circle/{radius}", name="circle_calc", methods={"GET"})
     */
    public function calculateCircle($radius): Response
    {
        $circle = new Circle();
        $circle->setRadius($radius);
        $surface = $circle->getSurface();
        $circumference = $circle->getCircumference();
        $data =  new \StdClass();
        $data->type = "circle";
        $data->radius = $radius;
        $data->surface = $surface;
        $data->circumference = $circumference;

        return $this->json($data);
    }

    /**
     * @Route("/sum_areas", name="sum_areas", methods={"GET"})
     */
    public function sumAreas(): Response
    {
        $triangle = new Triangle();
        $triangle->setA(1);
        $triangle->setB(2);
        $triangle->setC(2);

        $circle = new Circle();
        $circle->setRadius(1);

        return $this->json([
            $this->service->sumAreas($triangle, $circle),
            $this->service->sumAreas($circle, $triangle)
        ]);
    }

    /**
     * @Route("/sum_diameters", name="sum_diameters", methods={"GET"})
     */
    public function sumDiameters(): Response
    {
        $triangle = new Triangle();
        $triangle->setA(1);
        $triangle->setB(2);
        $triangle->setC(2);

        $circle = new Circle();
        $circle->setRadius(1);

        return $this->json([
            $this->service->sumDiameters($triangle, $circle),
            $this->service->sumDiameters($circle, $triangle)
        ]);
    }
}
