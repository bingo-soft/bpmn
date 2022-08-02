<?php

namespace Tests\Instance\Extension;

use Xml\Test\{
    AbstractTypeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};
use Bpmn\Instance\ResourceAssignmentExpressionInterface;

class PotentialStarterTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::EXTENSION_NS);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, ResourceAssignmentExpressionInterface::class, 0, 1)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
