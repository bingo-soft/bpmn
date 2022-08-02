<?php

namespace Tests\Instance\Bpmndi;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Tests\Instance\{
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Di\PlaneInterface;
use Bpmn\Instance\Bpmndi\{
    BpmnLabelInterface
};

class BpmnPlaneTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::BPMNDI_NS, PlaneInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "bpmnElement")
        ];
    }
}
