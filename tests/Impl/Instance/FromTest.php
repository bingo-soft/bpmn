<?php

namespace Tests\Impl\Instance;

use Xml\Test\{
    AbstractTypeAssumption
};
use Tests\Instance\{
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};
use Bpmn\Instance\ExpressionInterface;

class FromTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;
    protected $impl = true;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, ExpressionInterface::class);
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
