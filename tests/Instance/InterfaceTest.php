<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Instance\{
    RootElementInterface,
    OperationInterface
};

class InterfaceTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, RootElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, OperationInterface::class, 1)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "name", false, true),
            new AttributeAssumption(null, "implementationRef")
        ];
    }
}
