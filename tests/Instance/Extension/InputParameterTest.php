<?php

namespace Tests\Instance\Extension;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Extension\{
    InputParameterInterface,
    ScriptInterface,
    ListInterface,
    MapInterface
};
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class InputParameterTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::EXTENSION_NS);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, ScriptInterface::class, null, 1, BpmnModelConstants::EXTENSION_NS),
            new BpmnChildElementAssumption($this->model, ListInterface::class, null, 1, BpmnModelConstants::EXTENSION_NS),
            new BpmnChildElementAssumption($this->model, MapInterface::class, null, 1, BpmnModelConstants::EXTENSION_NS)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "name", false, true)
        ];
    }
}
