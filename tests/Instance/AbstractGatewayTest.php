<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Bpmn\{
    Bpmn,
    GatewayDirection
};
use Bpmn\Impl\{
    BpmnModelConstants,
    QueryImpl
};
use Bpmn\Instance\GatewayInterface;
use Xml\Impl\Util\ReflectUtil;

abstract class AbstractGatewayTest extends BpmnModelElementInstanceTest
{
    protected $gateway;

    protected function setUp(): void
    {
        parent::setUp();
        $inputStream = ReflectUtil::getResourceAsFile("tests/Resources/GatewaysTest.xml");
        $elementInstances = Bpmn::getInstance()->readModelFromStream($inputStream)->getModelElementsByType(
            $this->modelElementType
        );
        $this->assertCount(1, $elementInstances);
        $this->gateway = $elementInstances[0];
        $this->assertEquals(GatewayDirection::MIXED, $this->gateway->getGatewayDirection());
    }

    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, GatewayInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [ ];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "asyncBefore", false, false, false),
            new AttributeAssumption(BpmnModelConstants::EXTENSION_NS, "asyncAfter", false, false, false)
        ];
    }
}
