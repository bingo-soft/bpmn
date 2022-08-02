<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Instance\{
    DataInputInterface
};

class InputDataItemTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, DataInputInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
