<?php

namespace Tests\Instance\Di;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Instance\Di\ExtensionInterface;
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class DiagramElementTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, true, BpmnModelConstants::DI_NS);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, ExtensionInterface::class, 0, 1, BpmnModelConstants::DI_NS),
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "id", true)
        ];
    }
}
