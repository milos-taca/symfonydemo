<?php

namespace App\Services;

use App\Entity\Shape;

class Calculator
{

    public function sumAreas(Shape $shape1, Shape $shape2)
    {
        return $shape1->getSurface() + $shape2->getSurface();
    }
    public function sumDiameters(Shape $shape1, Shape $shape2)
    {
        return $shape1->getCircumference() + $shape2->getCircumference();
    }
}