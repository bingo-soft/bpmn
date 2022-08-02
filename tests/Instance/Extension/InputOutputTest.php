<?php

namespace Tests\Instance\Extension;

use Xml\Test\{
    AbstractTypeAssumption
};
use Bpmn\Instance\Extension\{
    InputParameterInterface,
    OutputParameterInterface
};
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class InputOutputTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::EXTENSION_NS);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, InputParameterInterface::class, null, null, BpmnModelConstants::EXTENSION_NS),
            new BpmnChildElementAssumption($this->model, OutputParameterInterface::class, null, null, BpmnModelConstants::EXTENSION_NS)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [];
    }
}
