<?php

namespace Bpmn\Instance\Bpmndi;

use Bpmn\Instance\Di\LabelInterface;

interface BpmnLabelInterface extends LabelInterface
{
    public function getLabelStyle(): BpmnLabelStyleInterface;

    public function setLabelStyle(BpmnLabelStyleInterface $labelStyle): void;
}
