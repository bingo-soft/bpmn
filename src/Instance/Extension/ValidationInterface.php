<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface ValidationInterface extends BpmnModelElementInstanceInterface
{
    public function getConstraints(): array;
}
