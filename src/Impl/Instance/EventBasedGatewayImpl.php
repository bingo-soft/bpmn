<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Builder\EventBasedGatewayBuilder;
use Bpmn\EventBasedGatewayType;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    EventBasedGatewayInterface,
    GatewayInterface
};

class EventBasedGatewayImpl extends GatewayImpl implements EventBasedGatewayInterface
{
    protected static $instantiateAttribute;
    protected static $eventGatewayTypeAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            EventBasedGatewayInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_EVENT_BASED_GATEWAY
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(GatewayInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new EventBasedGatewayImpl($instanceContext);
                }
            }
        );

        self::$instantiateAttribute = $typeBuilder->booleanAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_INSTANTIATE)
        ->defaultValue(false)
        ->build();

        self::$eventGatewayTypeAttribute = $typeBuilder->enumAttribute(
            BpmnModelConstants::BPMN_ATTRIBUTE_EVENT_GATEWAY_TYPE,
            EventBasedGatewayType::class
        )
        ->defaultValue(EventBasedGatewayType::EXCLUSIVE)
        ->build();

        $typeBuilder->build();
    }

    public function builder(): EventBasedGatewayBuilder
    {
        return new EventBasedGatewayBuilder($this->modelInstance, $this);
    }

    public function isInstantiate(): bool
    {
        return self::$instantiateAttribute->getValue($this);
    }

    public function setInstantiate(bool $isInstantiate): void
    {
        self::$instantiateAttribute->setValue($this, $isInstantiate);
    }

    public function getEventGatewayType(): string
    {
        return self::$eventGatewayTypeAttribute->getValue($this);
    }

    public function setEventGatewayType(string $eventGatewayType): void
    {
        self::$eventGatewayTypeAttribute->setValue($this, $eventGatewayType);
    }

    public function isAsyncAfter(): bool
    {
        throw new \Exception("'asyncAfter' is not supported for 'Event Based Gateway'");
    }

    public function setAsyncAfter(bool $isAsyncAfter): void
    {
        throw new \Exception("'asyncAfter' is not supported for 'Event Based Gateway'");
    }
}
