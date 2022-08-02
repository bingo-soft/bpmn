<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Impl\Instance\{
    DataInputRefs,
    OptionalInputRefs,
    WhileExecutingInputRefs,
    OutputSetRefs
};
use Bpmn\Instance\BaseElementInterface;

class InputSetTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, BaseElementInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, DataInputRefs::class),
            new BpmnChildElementAssumption($this->model, OptionalInputRefs::class),
            new BpmnChildElementAssumption($this->model, WhileExecutingInputRefs::class),
            new BpmnChildElementAssumption($this->model, OutputSetRefs::class)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "name")
        ];
    }
}
