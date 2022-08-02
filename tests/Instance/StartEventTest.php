<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    CatchEventInterface
};

class StartEventTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, CatchEventInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "isInterrupting", false, false, true),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "async", false, false, false),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "formHandlerClass"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "formKey"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "initiator")
        ];
    }
}
