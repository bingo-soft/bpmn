<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Instance\{
    DataOutputInterface
};

class OutputDataItemTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, DataOutputInterface::class);
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
