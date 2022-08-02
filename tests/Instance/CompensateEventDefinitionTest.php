<?php

namespace Tests\Instance;

use Xml\Test\AttributeAssumption;
use Bpmn\Instance\CompensateEventDefinitionInterface;

class CompensateEventDefinitionTest extends AbstractEventDefinitionTest
{
    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "waitForCompletion"),
            new AttributeAssumption(null, "activityRef")
        ];
    }

    public function testGetEventDefinition(): void
    {
        $eventDefinition = $this->eventDefinitionQuery->filterByType(
            CompensateEventDefinitionInterface::class
        )->singleResult();
        $this->assertFalse($eventDefinition === null);

        $this->assertTrue($eventDefinition->isWaitForCompletion());
        $this->assertEquals("task", $eventDefinition->getActivity()->getId());
    }
}
