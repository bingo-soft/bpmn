<?php

namespace Tests\Instance;

use Xml\Test\AttributeAssumption;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    TimeDateInterface,
    TimeDurationInterface,
    TimeCycleInterface,
    TimerEventDefinitionInterface
};

class TimerEventDefinitionTest extends AbstractEventDefinitionTest
{
    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, TimeDateInterface::class, 0, 1),
            new BpmnChildElementAssumption($this->model, TimeDurationInterface::class, 0, 1),
            new BpmnChildElementAssumption($this->model, TimeCycleInterface::class, 0, 1)
        ];
    }

    public function testGetEventDefinition(): void
    {
        $eventDefinitions = $this->eventDefinitionQuery->filterByType(
            TimerEventDefinitionInterface::class
        )->list();
        $this->assertCount(3, $eventDefinitions);
        foreach ($eventDefinitions as $eventDefinition) {
            $id = $eventDefinition->getId();
            $textContent = null;
            if ($id == "date") {
                $textContent = $eventDefinition->getTimeDate()->getTextContent();
            } elseif ($id == "duration") {
                $textContent = $eventDefinition->getTimeDuration()->getTextContent();
            } elseif ($id == "cycle") {
                $textContent = $eventDefinition->getTimeCycle()->getTextContent();
            }

            $this->assertEquals('${test}', $textContent);
        }
    }
}
