<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\Instance\ResourceRef;
use Bpmn\Instance\{
    BaseElementInterface,
    ResourceAssignmentExpressionInterface,
    ResourceParameterBindingInterface
};

class ResourceRoleTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, BaseElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, ResourceRef::class, 0, 1),
            new BpmnChildElementAssumption($this->model, ResourceParameterBindingInterface::class),
            new BpmnChildElementAssumption($this->model, ResourceAssignmentExpressionInterface::class, 0, 1)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "name")
        ];
    }
}
