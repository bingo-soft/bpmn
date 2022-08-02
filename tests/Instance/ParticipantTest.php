<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\Instance\{
    InterfaceRef,
    EndPointRef
};
use Bpmn\Instance\{
    BaseElementInterface,
    ParticipantMultiplicityInterface
};

class ParticipantTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, BaseElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, InterfaceRef::class),
            new BpmnChildElementAssumption($this->model, EndPointRef::class),
            new BpmnChildElementAssumption($this->model, ParticipantMultiplicityInterface::class, 0, 1)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "name"),
            new AttributeAssumption(null, "processRef")
        ];
    }
}
