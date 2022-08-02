<?php

namespace Tests\Instance\Di;

use Xml\Test\{
    AbstractTypeAssumption
};
use Bpmn\Instance\Di\ShapeInterface;
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class LabeledShapeTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, true, BpmnModelConstants::DI_NS, ShapeInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
