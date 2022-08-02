<?php

namespace Bpmn\Instance\Bpmndi;

use Bpmn\Instance\BaseElementInterface;
use Bpmn\Instance\Di\PlaneInterface;

interface BpmnPlaneInterface extends PlaneInterface
{
    public function getBpmnElement(): BaseElementInterface;

    public function setBpmnElement(BaseElementInterface $bpmnElement): void;
}
