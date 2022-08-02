<?php

namespace Bpmn\Instance\Bpmndi;

use Bpmn\Instance\Di\DiagramInterface;

interface BpmnDiagramInterface extends DiagramInterface
{
    public function getBpmnPlane(): BpmnPlaneInterface;

    public function setBpmnPlane(BpmnPlaneInterface $bpmnPlane): void;

    public function getBpmnLabelStyles(): array;
}
