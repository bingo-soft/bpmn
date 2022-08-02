<?php

namespace Bpmn\Impl\Instance\Bpmndi;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\BaseElementInterface;
use Bpmn\Instance\Bpmndi\{
    BpmnPlaneInterface
};
use Bpmn\Instance\Dc\FontInterface;
use Bpmn\Instance\Di\PlaneInterface;
use Bpmn\Impl\Instance\Di\PlaneImpl;

class BpmnPlaneImpl extends PlaneImpl implements BpmnPlaneInterface
{
    protected static $bpmnElementAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            BpmnPlaneInterface::class,
            BpmnModelConstants::BPMNDI_ELEMENT_BPMN_PLANE
        )
        ->namespaceUri(BpmnModelConstants::BPMNDI_NS)
        ->extendsType(PlaneInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new BpmnPlaneImpl($instanceContext);
                }
            }
        );

        self::$bpmnElementAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMNDI_ATTRIBUTE_BPMN_ELEMENT)
        ->qNameAttributeReference(BaseElementInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getBpmnElement(): BaseElementInterface
    {
        return self::$bpmnElementAttribute->getReferenceTargetElement($this);
    }

    public function setBpmnElement(BaseElementInterface $bpmnElement): void
    {
        self::$bpmnElementAttribute->setReferenceTargetElement($this, $bpmnElement);
    }
}
