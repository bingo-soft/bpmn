<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    EventInterface,
    FlowNodeInterface,
    PropertyInterface
};
use Bpmn\Instance\Bpmndi\BpmnShapeInterface;

abstract class EventImpl extends FlowNodeImpl implements EventInterface
{
    protected static $propertyCollection;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(EventInterface::class, BpmnModelConstants::BPMN_ELEMENT_EVENT)
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(FlowNodeInterface::class)
        ->abstractType();

        $sequence = $typeBuilder->sequence();

        self::$propertyCollection = $sequence->elementCollection(PropertyInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getProperties(): array
    {
        return self::$propertyCollection->get($this);
    }

    public function addProperty(PropertyInterface $property): void
    {
        self::$propertyCollection->add($this, $property);
    }

    public function getDiagramElement(): BpmnShapeInterface
    {
        return parent::getDiagramElement();
    }
}
