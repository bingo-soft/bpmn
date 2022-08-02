<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\Instance\{
    ParticipantRef,
    MessageFlowRef
};
use Bpmn\Instance\{
    BaseElementInterface,
    CorrelationKeyInterface
};

class ConversationNodeTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, true, null, BaseElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, ParticipantRef::class),
            new BpmnChildElementAssumption($this->model, MessageFlowRef::class),
            new BpmnChildElementAssumption($this->model, CorrelationKeyInterface::class)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "name")
        ];
    }
}
