<?php

namespace Tests\Instance;

use Xml\Test\AbstractTypeAssumption;
use Bpmn\Instance\BaseElementInterface;

class ExtensionElementsTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false);
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
