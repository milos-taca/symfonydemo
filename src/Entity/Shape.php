<?php

namespace App\Entity;

abstract class Shape
{
    abstract public function getSurface();
    abstract public function getCircumference();
}