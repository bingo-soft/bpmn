<?php

namespace Tests\Instance;

use Bpmn\Instance\CancelEventDefinitionInterface;

class CancelEventDefinitionTest extends AbstractEventDefinitionTest
{
    public function testGetEventDefinition(): void
    {
        $eventDefinition = $this->eventDefinitionQuery->filterByType(
            CancelEventDefinitionInterface::class
        )->singleResult();
        $this->assertFalse($eventDefinition === null);
    }
}
