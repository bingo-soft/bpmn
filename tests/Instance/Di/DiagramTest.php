<?php

namespace Tests\Instance\Di;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class DiagramTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, true, BpmnModelConstants::DI_NS);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "name"),
            new AttributeAssumption(null, "documentation"),
            new AttributeAssumption(null, "resolution"),
            new AttributeAssumption(null, "id", true)
        ];
    }
}
