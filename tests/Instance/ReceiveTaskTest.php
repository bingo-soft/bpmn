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
    TaskInterface
};

class ReceiveTaskTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, TaskInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "implementation", false, false, "##WebService"),
            new AttributeAssumption(null, "instantiate", false, false, false),
            new AttributeAssumption(null, "messageRef"),
            new AttributeAssumption(null, "operationRef")
        ];
    }
}
