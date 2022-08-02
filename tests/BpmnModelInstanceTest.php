<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Bpmn\{
    Bpmn
};
use Bpmn\Instance\{
    DefinitionsInterface
};

class BpmnModelInstanceTest extends TestCase
{
    public function testClone(): void
    {
        $modelInstance = Bpmn::getInstance()->createEmptyModel();

        $definitions = $modelInstance->newInstance(DefinitionsInterface::class);
        $definitions->setId("TestId");
        $modelInstance->setDefinitions($definitions);

        $cloneInstance = $modelInstance->clone();
        $cloneInstance->getDefinitions()->setId("TestId2");

        $this->assertEquals("TestId", $modelInstance->getDefinitions()->getId());
        $this->assertEquals("TestId2", $cloneInstance->getDefinitions()->getId());
    }
}
