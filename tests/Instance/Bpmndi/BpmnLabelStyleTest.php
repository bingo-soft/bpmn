<?php

namespace Tests\Instance\Bpmndi;

use Xml\Test\{
    AbstractTypeAssumption
};
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Dc\FontInterface;
use Bpmn\Instance\Di\StyleInterface;
use Bpmn\Instance\Bpmndi\{
    BpmnLabelInterface
};

class BpmnLabelStyleTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::BPMNDI_NS, StyleInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, FontInterface::class, 1, 1, BpmnModelConstants::DC_NS)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
