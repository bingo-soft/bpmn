<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption
};
use Bpmn\Instance\{
    BaseElementInterface,
    ExpressionInterface
};

class ResourceAssignmentExpressionTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, BaseElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, ExpressionInterface::class, 1, 1)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
