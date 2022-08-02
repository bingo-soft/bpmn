<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    ArtifactInterface,
    TextAnnotationInterface,
    TextInterface
};

class TextAnnotationImpl extends ArtifactImpl implements TextAnnotationInterface
{
    protected static $textFormatAttribute;
    protected static $textChild;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            TextAnnotationInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_TEXT_ANNOTATION
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(ArtifactInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new TextAnnotationImpl($instanceContext);
                }
            }
        );

        self::$textFormatAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_TEXT_FORMAT)
        ->defaultValue("text/plain")
        ->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$textChild = $sequenceBuilder->element(TextInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getTextFormat(): string
    {
        return self::$textFormatAttribute->getValue($this);
    }

    public function setTextFormat(string $textFormat): void
    {
        self::$textFormatAttribute->setValue($this, $textFormat);
    }

    public function getText(): TextInterface
    {
        return self::$textChild->getChild($this);
    }

    public function setText(TextInterface $text): void
    {
        self::$textChild->setChild($this, $text);
    }
}
