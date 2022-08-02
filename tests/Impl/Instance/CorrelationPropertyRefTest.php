<?php

namespace Tests\Impl\Instance;

use Xml\Test\{
    AbstractTypeAssumption
};
use Tests\Instance\{
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class CorrelationPropertyRefTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;
    protected $impl = true;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false);
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
