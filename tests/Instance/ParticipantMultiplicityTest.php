<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\Instance\{
    ErrorRef,
    InMessageRef,
    OutMessageRef
};
use Bpmn\Instance\{
    BaseElementInterface
};

class ParticipantMultiplicityTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, BaseElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "minimum", false, false, 0),
            new AttributeAssumption(null, "maximum", false, false, 1)
        ];
    }
}
