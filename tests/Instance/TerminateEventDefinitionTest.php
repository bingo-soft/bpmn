<?php

namespace Tests\Instance;

use Xml\Test\AttributeAssumption;
use Bpmn\Instance\{
    TerminateEventDefinitionInterface
};

class TerminateEventDefinitionTest extends AbstractEventDefinitionTest
{
    public function testGetEventDefinition(): void
    {
        $eventDefinition = $this->eventDefinitionQuery->filterByType(
            TerminateEventDefinitionInterface::class
        )->singleResult();
        $this->assertFalse($eventDefinition === null);
    }
}
