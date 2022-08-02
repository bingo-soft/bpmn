<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    RootElementInterface,
    ItemDefinitionInterface,
    SignalInterface
};

class SignalImpl extends BaseElementImpl implements SignalInterface
{
    protected static $nameAttribute;
    protected static $structureRefAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            SignalInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_SIGNAL
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(RootElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new SignalImpl($instanceContext);
                }
            }
        );

        self::$nameAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_NAME)
        ->build();

        self::$structureRefAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_STRUCTURE_REF)
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

    public function getStructure(): ItemDefinitionInterface
    {
        return self::$structureRefAttribute->getReferenceTargetElement($this);
    }

    public function setStructure(ItemDefinitionInterface $structure): void
    {
        self::$structureRefAttribute->setReferenceTargetElement($this, $structure);
    }
}
