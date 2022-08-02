<?php

namespace Tests\Instance\Di;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Instance\Di\NodeInterface;
use Bpmn\Instance\Dc\BoundsInterface;
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class LabelTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, true, BpmnModelConstants::DI_NS, NodeInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, BoundsInterface::class, 0, 1, BpmnModelConstants::DC_NS),
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
