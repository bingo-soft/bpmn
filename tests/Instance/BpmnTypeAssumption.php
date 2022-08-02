<?php

namespace Tests\Instance;

use Bpmn\Impl\BpmnModelConstants;
use Xml\Test\AbstractTypeAssumption;

class BpmnTypeAssumption extends AbstractTypeAssumption
{
    public function getDefaultNamespace(): string
    {
        return BpmnModelConstants::BPMN20_NS;
    }
}
