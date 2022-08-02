<?php

namespace Tests\Instance\Bpmndi;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Di\LabeledShapeInterface;
use Bpmn\Instance\Bpmndi\{
    BpmnLabelInterface
};

class BpmnShapeTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::BPMNDI_NS, LabeledShapeInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, BpmnLabelInterface::class, 0, 1, BpmnModelConstants::BPMNDI_NS)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "bpmnElement"),
            new AttributeAssumption(null, "isHorizontal"),
            new AttributeAssumption(null, "isExpanded"),
            new AttributeAssumption(null, "isMarkerVisible"),
            new AttributeAssumption(null, "isMessageVisible"),
            new AttributeAssumption(null, "participantBandKind"),
            new AttributeAssumption(null, "choreographyActivityShape")
        ];
    }
}
