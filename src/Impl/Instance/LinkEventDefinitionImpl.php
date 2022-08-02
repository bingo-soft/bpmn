<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    LinkEventDefinitionInterface,
    EventDefinitionInterface
};

class LinkEventDefinitionImpl extends EventDefinitionImpl implements LinkEventDefinitionInterface
{
    protected static $nameAttribute;
    protected static $sourceCollection;
    protected static $targetChild;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            LinkEventDefinitionInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_LINK_EVENT_DEFINITION
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(EventDefinitionInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new LinkEventDefinitionImpl($instanceContext);
                }
            }
        );

        self::$nameAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_NAME)
        ->required()
        ->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$sourceCollection = $sequenceBuilder->elementCollection(Source::class)
        ->qNameElementReferenceCollection(LinkEventDefinitionInterface::class)
        ->build();

        self::$targetChild = $sequenceBuilder->element(Target::class)
        ->qNameElementReference(LinkEventDefinitionInterface::class)
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

    public function getSources(): array
    {
        return self::$sourceCollection->getReferenceTargetElements($this);
    }

    public function getTarget(): LinkEventDefinitionInterface
    {
        return self::$targetChild->getReferenceTargetElement($this);
    }

    public function setTarget(LinkEventDefinitionInterface $target): void
    {
        self::$targetChild->setReferenceTargetElement($this, $target);
    }
}
