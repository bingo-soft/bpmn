<?php

namespace Tests\Instance;

use Xml\Test\AbstractTypeAssumption;
use Bpmn\Bpmn;
use Bpmn\Impl\QueryImpl;
use Bpmn\Instance\EventDefinitionInterface;
use Xml\Impl\Util\ReflectUtil;

abstract class AbstractEventDefinitionTest extends BpmnModelElementInstanceTest
{
    protected $eventDefinitionQuery;

    protected function setUp(): void
    {
        parent::setUp();
        $inputStream = ReflectUtil::getResourceAsFile("tests/Resources/EventDefinitionsTest.xml");
        $event = Bpmn::getInstance()->readModelFromStream($inputStream)->getModelElementById("event");
        $this->eventDefinitionQuery = new QueryImpl($event->getEventDefinitions());
    }

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, EventDefinitionInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
