<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    ActivityInterface,
    ArtifactInterface,
    FlowElementInterface,
    LaneSetInterface
};

class SubProcessTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, ActivityInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, LaneSetInterface::class),
            new BpmnChildElementAssumption($this->model, FlowElementInterface::class),
            new BpmnChildElementAssumption($this->model, ArtifactInterface::class)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "triggeredByEvent", false, false, false),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "async", false, false, false)
        ];
    }
}
