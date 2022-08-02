<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Bpmn\GatewayDirection;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    GatewayInterface,
    FlowNodeInterface
};
use Bpmn\Exception\BpmnModelException;
use Bpmn\Builder\AbstractGatewayBuilder;
use Bpmn\Instance\Bpmndi\BpmnShapeInterface;

abstract class GatewayImpl extends FlowNodeImpl implements GatewayInterface
{
    protected static $gatewayDirectionAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(GatewayInterface::class, BpmnModelConstants::BPMN_ELEMENT_GATEWAY)
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(FlowNodeInterface::class)
        ->abstractType();

        self::$gatewayDirectionAttribute = $typeBuilder->enumAttribute(
            BpmnModelConstants::BPMN_ATTRIBUTE_GATEWAY_DIRECTION,
            GatewayDirection::class
        )
        ->defaultValue(GatewayDirection::UNSPECIFIED)
        ->build();

        $typeBuilder->build();
    }

    public function builder(): AbstractGatewayBuilder
    {
        throw new BpmnModelException("No builder implemented");
    }

    public function getGatewayDirection(): string
    {
        return self::$gatewayDirectionAttribute->getValue($this);
    }

    public function setGatewayDirection(string $gatewayDirection): void
    {
        self::$gatewayDirectionAttribute->setValue($this, $gatewayDirection);
    }

    public function getDiagramElement(): BpmnShapeInterface
    {
        return parent::getDiagramElement();
    }
}
