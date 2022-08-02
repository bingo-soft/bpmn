<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption
};
use Bpmn\Instance\{
    ConversationNodeInterface
};

class SubConversationTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, ConversationNodeInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, ConversationNodeInterface::class)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
