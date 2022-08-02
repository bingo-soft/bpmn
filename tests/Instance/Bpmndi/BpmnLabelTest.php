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
use Bpmn\Instance\Di\LabelInterface;
use Bpmn\Instance\Bpmndi\{
    BpmnLabelInterface
};

class BpmnLabelTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::BPMNDI_NS, LabelInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "labelStyle")
        ];
    }
}
