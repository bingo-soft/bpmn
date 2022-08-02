<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\Instance\{
    InnerParticipantRef,
    OuterParticipantRef
};
use Bpmn\Instance\{
    BaseElementInterface
};

class ParticipantAssociationTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, BaseElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, InnerParticipantRef::class, 1, 1),
            new BpmnChildElementAssumption($this->model, OuterParticipantRef::class, 1, 1)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
