<?php

namespace Bpmn\Impl\Instance\Bpmndi;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Bpmndi\{
    BpmnLabelInterface,
    BpmnLabelStyleInterface
};
use Bpmn\Instance\Di\LabelInterface;
use Bpmn\Impl\Instance\Di\LabelImpl;

class BpmnLabelImpl extends LabelImpl implements BpmnLabelInterface
{
    protected static $labelStyleAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            BpmnLabelInterface::class,
            BpmnModelConstants::BPMNDI_ELEMENT_BPMN_LABEL
        )
        ->namespaceUri(BpmnModelConstants::BPMNDI_NS)
        ->extendsType(LabelInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new BpmnLabelImpl($instanceContext);
                }
            }
        );

        self::$labelStyleAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMNDI_ATTRIBUTE_LABEL_STYLE)
        ->qNameAttributeReference(BpmnLabelStyleInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getLabelStyle(): BpmnLabelStyleInterface
    {
        return self::$labelStyleAttribute->getReferenceTargetElement($this);
    }

    public function setLabelStyle(BpmnLabelStyleInterface $labelStyle): void
    {
        self::$labelStyleAttribute->setReferenceTargetElement($this, $labelStyle);
    }
}
