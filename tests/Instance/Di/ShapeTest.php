<?php

namespace Tests\Instance\Di;

use Xml\Test\{
    AbstractTypeAssumption
};
use Bpmn\Instance\Dc\BoundsInterface;
use Bpmn\Instance\Di\{
    NodeInterface
};
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class ShapeTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, true, BpmnModelConstants::DI_NS, NodeInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, BoundsInterface::class, 1, 1, BpmnModelConstants::DC_NS),
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
