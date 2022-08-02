<?php

namespace Tests\Instance\Extension;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class OutTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::EXTENSION_NS);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "source"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "sourceExpression"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "variables"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "target"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "local")
        ];
    }
}
