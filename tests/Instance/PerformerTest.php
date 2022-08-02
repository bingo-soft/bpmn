<?php

namespace Tests\Instance;

use Xml\Test\AbstractTypeAssumption;
use Bpmn\Instance\{
    ResourceRoleInterface
};

class PerformerTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, ResourceRoleInterface::class);
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
