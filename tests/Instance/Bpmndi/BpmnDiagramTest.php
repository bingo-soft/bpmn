<?php

namespace Tests\Instance\Bpmndi;

use Xml\Test\AbstractTypeAssumption;
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Di\DiagramInterface;
use Bpmn\Instance\Bpmndi\{
    BpmnPlaneInterface,
    BpmnLabelStyleInterface
};

class BpmnDiagramTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::BPMNDI_NS, DiagramInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, BpmnPlaneInterface::class, 1, 1, BpmnModelConstants::BPMNDI_NS),
            new BpmnChildElementAssumption($this->model, BpmnLabelStyleInterface::class, null, null, BpmnModelConstants::BPMNDI_NS)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
