<?php

namespace Tests\Instance;

use Xml\Test\AttributeAssumption;
use Bpmn\EventBasedGatewayType;
use Bpmn\Instance\ActivationConditionInterface;

class ExclusiveGatewayTest extends AbstractGatewayTest
{
    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "default")
        ];
    }

    public function testGetDefault(): void
    {
        $this->assertEquals("flow", $this->gateway->getDefault()->getId());
    }
}
