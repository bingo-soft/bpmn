<?php

namespace Bpmn\Impl\Instance\Bpmndi;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Bpmndi\{
    BpmnDiagramInterface,
    BpmnLabelStyleInterface,
    BpmnPlaneInterface
};
use Bpmn\Instance\Di\DiagramInterface;
use Bpmn\Impl\Instance\Di\DiagramImpl;

class BpmnDiagramImpl extends DiagramImpl implements BpmnDiagramInterface
{
    protected static $bpmnPlaneChild;
    protected static $bpmnLabelStyleCollection;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            BpmnDiagramInterface::class,
            BpmnModelConstants::BPMNDI_ELEMENT_BPMN_DIAGRAM
        )
        ->namespaceUri(BpmnModelConstants::BPMNDI_NS)
        ->extendsType(DiagramInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new BpmnDiagramImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$bpmnPlaneChild = $sequenceBuilder->element(BpmnPlaneInterface::class)
        ->required()
        ->build();

        self::$bpmnLabelStyleCollection = $sequenceBuilder->elementCollection(BpmnLabelStyleInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getBpmnPlane(): BpmnPlaneInterface
    {
        return self::$bpmnPlaneChild->getChild($this);
    }

    public function setBpmnPlane(BpmnPlaneInterface $bpmnPlane): void
    {
        self::$bpmnPlaneChild->setChild($this, $bpmnPlane);
    }

    public function getBpmnLabelStyles(): array
    {
        return self::$bpmnLabelStyleCollection->get($this);
    }
}
