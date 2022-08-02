<?php

namespace Tests\Instance;

use Xml\Test\AttributeAssumption;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    ConditionalEventDefinitionInterface,
    ConditionInterface
};

class ConditionalEventDefinitionTest extends AbstractEventDefinitionTest
{
    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, ConditionInterface::class, 1, 1)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "variableName"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "variableEvents")
        ];
    }

    public function testGetEventDefinition(): void
    {
        $eventDefinition = $this->eventDefinitionQuery->filterByType(
            ConditionalEventDefinitionInterface::class
        )->singleResult();
        $this->assertFalse($eventDefinition === null);

        $this->assertNull($eventDefinition->getVariableEvents());
        $this->assertNull($eventDefinition->getVariableName());
        $condition = $eventDefinition->getCondition();
        $this->assertFalse($condition === null);
        $this->assertEquals('${test}', $condition->getTextContent());
    }
}
