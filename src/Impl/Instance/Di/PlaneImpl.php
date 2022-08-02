<?php

namespace Bpmn\Impl\Instance\Di;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Di\{
    DiagramElementInterface,
    PlaneInterface,
    NodeInterface
};

abstract class PlaneImpl extends NodeImpl implements PlaneInterface
{
    protected static $diagramElementCollection;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            PlaneInterface::class,
            BpmnModelConstants::DI_ELEMENT_PLANE
        )
        ->namespaceUri(BpmnModelConstants::DI_NS)
        ->extendsType(NodeInterface::class)
        ->abstractType();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$diagramElementCollection = $sequenceBuilder->elementCollection(DiagramElementInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getDiagramElements(): array
    {
        return self::$diagramElementCollection->get($this);
    }

    public function addDiagramElement(DiagramElementInterface $element): void
    {
        self::$diagramElementCollection->add($this, $element);
    }
}
