<?php

namespace Tests\Instance;

use Bpmn\Impl\BpmnModelConstants;
use Xml\Test\AbstractChildElementAssumption;

class BpmnChildElementAssumption extends AbstractChildElementAssumption
{
    public function getDefaultNamespace(): string
    {
        return BpmnModelConstants::BPMN20_NS;
    }
}
