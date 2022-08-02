<?php

namespace Bpmn\Impl\Instance\Di;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\Di\{
    LabeledEdgeInterface,
    EdgeInterface
};

abstract class LabeledEdgeImpl extends EdgeImpl implements LabeledEdgeInterface
{
    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            LabeledEdgeInterface::class,
            BpmnModelConstants::DI_ELEMENT_LABELED_EDGE
        )
        ->namespaceUri(BpmnModelConstants::DI_NS)
        ->extendsType(EdgeInterface::class)
        ->abstractType();

        $typeBuilder->build();
    }
}
