<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    ScriptInterface,
    TaskInterface
};

class ScriptTaskTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, TaskInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, ScriptInterface::class, 0, 1)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "scriptFormat"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "resultVariable"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "resource")
        ];
    }
}
