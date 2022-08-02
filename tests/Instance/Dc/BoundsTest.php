<?php

namespace Tests\Instance\Dc;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class BoundsTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::DC_NS);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "x", false, true),
            new AttributeAssumption(null, "y", false, true),
            new AttributeAssumption(null, "width", false, true),
            new AttributeAssumption(null, "height", false, true)
        ];
    }
}
