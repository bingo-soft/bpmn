<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    CorrelationPropertyInterface,
    CorrelationPropertyRetrievalExpressionInterface,
    ItemDefinitionInterface,
    RootElementInterface
};

class CorrelationPropertyImpl extends RootElementImpl implements CorrelationPropertyInterface
{
    protected static $nameAttribute;
    protected static $typeAttribute;
    protected static $correlationPropertyRetrievalExpressionCollection;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            CorrelationPropertyInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_CORRELATION_PROPERTY
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(RootElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new CorrelationPropertyImpl($instanceContext);
                }
            }
        );

        self::$nameAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_NAME)
        ->build();

        self::$typeAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_TYPE)
        ->qNameAttributeReference(ItemDefinitionInterface::class)
        ->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$correlationPropertyRetrievalExpressionCollection = $sequenceBuilder
        ->elementCollection(CorrelationPropertyRetrievalExpressionInterface::class)
        ->required()
        ->build();

        $typeBuilder->build();
    }

    public function getName(): string
    {
        return self::$nameAttribute->getValue($this);
    }

    public function setName(string $name): void
    {
        self::$nameAttribute->setValue($this, $name);
    }

    public function getType(): ItemDefinitionInterface
    {
        return self::$typeAttribute->getValue($this);
    }

    public function setType(ItemDefinitionInterface $type): void
    {
        self::$typeAttribute->setValue($this, $type);
    }

    public function getCorrelationPropertyRetrievalExpressions(): array
    {
        return self::$correlationPropertyRetrievalExpressionCollection->get($this);
    }
}
