<?php

namespace Tests\Instance;

use Xml\Test\AttributeAssumption;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\ActivationConditionInterface;

class ParallelGatewayTest extends AbstractGatewayTest
{
    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "async", false, false, false)
        ];
    }
}
