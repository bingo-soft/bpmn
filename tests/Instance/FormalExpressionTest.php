<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Instance\{
    ExpressionInterface
};

class FormalExpressionTest extends BpmnModelElementInstanceTest
{
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
        return [
            new AttributeAssumption(null, "language"),
            new AttributeAssumption(null, "evaluatesToTypeRef")
        ];
    }
}
