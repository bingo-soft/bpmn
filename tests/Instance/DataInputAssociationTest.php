<?php

namespace Tests\Instance;

use Xml\Test\AbstractTypeAssumption;
use Bpmn\Instance\DataAssociationInterface;

class DataInputAssociationTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, DataAssociationInterface::class);
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
