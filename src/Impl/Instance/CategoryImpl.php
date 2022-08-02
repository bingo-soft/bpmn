<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    CategoryInterface,
    CategoryValueInterface,
    RootElementInterface
};

class CategoryImpl extends RootElementImpl implements CategoryInterface
{
    protected static $nameAttribute;
    protected static $categoryValuesCollection;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            CategoryInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_CATEGORY
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(RootElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new CategoryImpl($instanceContext);
                }
            }
        );

        self::$nameAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::BPMN_ATTRIBUTE_NAME
        )->required()->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$categoryValuesCollection = $sequenceBuilder->elementCollection(
            CategoryValueInterface::class
        )->build();

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

    public function getCategoryValues(): array
    {
        return self::$categoryValuesCollection->get($this);
    }
}
