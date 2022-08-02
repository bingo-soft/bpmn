<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\Instance\SupportedInterfaceRef;
use Bpmn\Instance\{
    IoBindingInterface,
    IoSpecificationInterface,
    RootElementInterface
};

class CallableElementTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, RootElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, SupportedInterfaceRef::class),
            new BpmnChildElementAssumption($this->model, IoSpecificationInterface::class, 0, 1),
            new BpmnChildElementAssumption($this->model, IoBindingInterface::class),
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "name")
        ];
    }
}
