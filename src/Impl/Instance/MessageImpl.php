<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\ItemKind;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    ItemDefinitionInterface,
    MessageInterface,
    RootElementInterface
};

class MessageImpl extends RootElementImpl implements MessageInterface
{
    protected static $nameAttribute;
    protected static $itemRefAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            MessageInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_MESSAGE
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(RootElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new MessageImpl($instanceContext);
                }
            }
        );

        self::$nameAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_NAME)
        ->build();

        self::$itemRefAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_ITEM_REF)
        ->qNameAttributeReference(ItemDefinitionInterface::class)
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

    public function getItem(): ItemDefinitionInterface
    {
        return self::$itemRefAttribute->getReferenceTargetElement($this);
    }

    public function setItem(ItemDefinitionInterface $item): void
    {
        self::$itemRefAttribute->setReferenceTargetElement($this, $item);
    }
}
