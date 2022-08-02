<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\EventDefinitionRef;
use Bpmn\Instance\{
    DataInputAssociationInterface,
    DataInputInterface,
    EventDefinitionInterface,
    EventInterface,
    InputSetInterface
};

class ThrowEventTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, true, null, EventInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, DataInputInterface::class),
            new BpmnChildElementAssumption($this->model, DataInputAssociationInterface::class),
            new BpmnChildElementAssumption($this->model, InputSetInterface::class, 0, 1),
            new BpmnChildElementAssumption($this->model, EventDefinitionInterface::class),
            new BpmnChildElementAssumption($this->model, EventDefinitionRef::class)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
