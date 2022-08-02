<?php

namespace Bpmn\Impl\Instance\Bpmndi;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Bpmndi\{
    BpmnLabelStyleInterface
};
use Bpmn\Instance\Dc\FontInterface;
use Bpmn\Instance\Di\StyleInterface;
use Bpmn\Impl\Instance\Di\StyleImpl;

class BpmnLabelStyleImpl extends StyleImpl implements BpmnLabelStyleInterface
{
    protected static $fontChild;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            BpmnLabelStyleInterface::class,
            BpmnModelConstants::BPMNDI_ELEMENT_BPMN_LABEL_STYLE
        )
        ->namespaceUri(BpmnModelConstants::BPMNDI_NS)
        ->extendsType(StyleInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new BpmnLabelStyleImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$fontChild = $sequenceBuilder->element(FontInterface::class)
        ->required()
        ->build();

        $typeBuilder->build();
    }

    public function getFont(): FontInterface
    {
        return self::$fontChild->getChild($this);
    }

    public function setFont(FontInterface $font): void
    {
        self::$fontChild->setChild($this, $font);
    }
}
