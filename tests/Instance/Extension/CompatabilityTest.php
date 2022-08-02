<?php

namespace Tests\Instance\Extension;

use PHPUnit\Framework\TestCase;
use Tests\BpmnTestConstants;
use Bpmn\Bpmn;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Extension\ExecutionListenerInterface;

class CompatabilityTest extends TestCase
{
    public function testModifyingElementWithActivitiNsKeepsIt(): void
    {
        $modelInstance = Bpmn::getInstance()->readModelFromStream(
            fopen(realpath(".") . "/tests/Resources/ExtensionsCompatabilityTest.xml", "r+")
        );
        $process = $modelInstance->getModelElementById(BpmnTestConstants::PROCESS_ID);
        $extensionElements = $process->getExtensionElements();
        $listeners = $extensionElements->getChildElementsByType(ExecutionListenerInterface::class);
        $listenerClass = "org.foo.Bar";
        foreach ($listeners as $listener) {
            $listener->setClass($listenerClass);
        }
        foreach ($listeners as $listener) {
            $this->assertEquals(
                $listenerClass,
                $listener->getAttributeValueNs(BpmnModelConstants::ACTIVITI_NS, "class")
            );
        }
    }

    public function testModifyingAttributeWithActivitiNsKeepsIt(): void
    {
        $modelInstance = Bpmn::getInstance()->readModelFromStream(
            fopen(realpath(".") . "/tests/Resources/ExtensionsCompatabilityTest.xml", "r+")
        );
        $process = $modelInstance->getModelElementById(BpmnTestConstants::PROCESS_ID);
        $priority = "9000";
        $process->setJobPriority($priority);
        $process->setTaskPriority($priority);
        $historyTimeToLive = 10;
        $process->setHistoryTimeToLive($historyTimeToLive);
        $process->setIsStartableInTasklist(false);
        $process->setVersionTag("v1.0.0");
        $this->assertEquals($priority, $process->getAttributeValueNs(BpmnModelConstants::ACTIVITI_NS, "jobPriority"));
        $this->assertEquals($priority, $process->getAttributeValueNs(BpmnModelConstants::ACTIVITI_NS, "taskPriority"));
        $this->assertEquals($historyTimeToLive, $process->getAttributeValueNs(BpmnModelConstants::ACTIVITI_NS, "historyTimeToLive"));
        $this->assertFalse($process->isStartableInTasklist());
        $this->assertEquals("v1.0.0", $process->getVersionTag());
    }
}
