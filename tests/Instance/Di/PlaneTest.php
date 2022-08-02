<?php

namespace Tests\Instance\Di;

use Xml\Test\{
    AbstractTypeAssumption
};
use Bpmn\Instance\Di\{
    DiagramElementInterface,
    NodeInterface
};
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class PlaneTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, true, BpmnModelConstants::DI_NS, NodeInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, DiagramElementInterface::class, null, null, BpmnModelConstants::DI_NS),
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
