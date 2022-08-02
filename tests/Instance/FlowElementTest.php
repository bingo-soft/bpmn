<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\Instance\CategoryValueRef;
use Bpmn\Instance\{
    AuditingInterface,
    BaseElementInterface,
    MonitoringInterface
};

class FlowElementTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, true, null, BaseElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, AuditingInterface::class, 0, 1),
            new BpmnChildElementAssumption($this->model, MonitoringInterface::class, 0, 1),
            new BpmnChildElementAssumption($this->model, CategoryValueRef::class)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "name")
        ];
    }
}
