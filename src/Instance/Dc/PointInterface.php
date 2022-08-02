<?php

namespace Bpmn\Instance\Dc;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface PointInterface extends BpmnModelElementInstanceInterface
{
    public function getX(): float;

    public function setX(float $x): void;

    public function getY(): float;

    public function setY(float $y): void;
}
