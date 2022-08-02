<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface InputOutputInterface extends BpmnModelElementInstanceInterface
{
    public function getInputParameters(): array;

    public function getOutputParameters(): array;
}
