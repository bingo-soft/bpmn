<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\FormalExpressionInterface;

class ConditionExpressionTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, FormalExpressionInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(BpmnModelConstants::XSI_NS, "type", false, false, "tFormalExpression"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "resource")
        ];
    }
}
