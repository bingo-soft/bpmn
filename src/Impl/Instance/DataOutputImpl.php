<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    DataOutputInterface,
    ItemAwareElementInterface
};

class DataOutputImpl extends ItemAwareElementImpl implements DataOutputInterface
{
    protected static $nameAttribute;
    protected static $isCollectionAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            DataOutputInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_DATA_OUTPUT
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(ItemAwareElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new DataOutputImpl($instanceContext);
                }
            }
        );

        self::$nameAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_NAME)
        ->build();

        self::$isCollectionAttribute = $typeBuilder->booleanAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_IS_COLLECTION)
        ->defaultValue(false)
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

    public function isCollection(): bool
    {
        return self::$isCollectionAttribute->getValue($this);
    }

    public function setCollection(bool $isCollection): void
    {
        self::$isCollectionAttribute->setValue($this, $isCollection);
    }
}
