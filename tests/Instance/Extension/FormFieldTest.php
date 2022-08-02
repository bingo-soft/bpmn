<?php

namespace Tests\Instance\Extension;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\Instance\Extension\{
    PropertiesInterface,
    ValidationInterface,
    ValueInterface
};
use Bpmn\Impl\BpmnModelConstants;
use Tests\Instance\{
    BpmnChildElementAssumption,
    BpmnModelElementInstanceTest,
    BpmnTypeAssumption
};

class FormFieldTest extends BpmnModelElementInstanceTest
{
    protected $namespace = __NAMESPACE__;

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, BpmnModelConstants::EXTENSION_NS);
    }

    public function getChildElementAssumptions(): array
    {
        return [
            new BpmnChildElementAssumption($this->model, PropertiesInterface::class, 0, 1, BpmnModelConstants::EXTENSION_NS),
            new BpmnChildElementAssumption($this->model, ValidationInterface::class, 0, 1, BpmnModelConstants::EXTENSION_NS),
            new BpmnChildElementAssumption($this->model, ValueInterface::class, null, null, BpmnModelConstants::EXTENSION_NS)
        ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "id"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "label"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "type"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "datePattern"),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "defaultValue")
        ];
    }
}
