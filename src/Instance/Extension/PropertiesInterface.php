<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface PropertiesInterface extends BpmnModelElementInstanceInterface
{
    public function getProperties(): array;
}
