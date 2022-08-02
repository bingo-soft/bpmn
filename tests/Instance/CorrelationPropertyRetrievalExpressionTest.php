<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\Instance\MessagePath;
use Bpmn\Instance\{
    BaseElementInterface
};

class CorrelationPropertyRetrievalExpressionTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, BaseElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, MessagePath::class, 1, 1)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "messageRef", false, true)
        ];
    }
}
