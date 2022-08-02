<?php

namespace Tests\Instance\Extension;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\TimerEventDefinitionInterface;
use Bpmn\Instance\Extension\{
    FieldInterface,
    ScriptInterface
};
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class TaskListenerTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::EXTENSION_NS);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, FieldInterface::class, null, null, BpmnModelConstants::EXTENSION_NS),
            new BpmnChildElementAssumption($this->model, ScriptInterface::class, 0, 1, BpmnModelConstants::EXTENSION_NS),
            new BpmnChildElementAssumption($this->model, TimerEventDefinitionInterface::class, 0, 1)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "event"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "class"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "expression"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "delegateExpression")
        ];
    }
}
