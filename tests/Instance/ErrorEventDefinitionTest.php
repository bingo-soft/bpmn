<?php

namespace Tests\Instance;

use Xml\Test\AttributeAssumption;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    ErrorEventDefinitionInterface
};

class ErrorEventDefinitionTest extends AbstractEventDefinitionTest
{
    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "errorRef"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "errorCodeVariable"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "errorMessageVariable")
        ];
    }

    public function testGetEventDefinition(): void
    {
        $eventDefinition = $this->eventDefinitionQuery->filterByType(
            ErrorEventDefinitionInterface::class
        )->singleResult();
        $this->assertFalse($eventDefinition === null);

        $this->assertEquals("error", $eventDefinition->getError()->getId());
    }
}
