<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Bpmn\Builder\IntermediateThrowEventBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    IntermediateThrowEventInterface,
    ThrowEventInterface
};

class IntermediateThrowEventImpl extends ThrowEventImpl implements IntermediateThrowEventInterface
{
    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            IntermediateThrowEventInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_INTERMEDIATE_THROW_EVENT
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(ThrowEventInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new IntermediateThrowEventImpl($instanceContext);
                }
            }
        );

        $typeBuilder->build();
    }

    public function builder(): IntermediateThrowEventBuilder
    {
        return new IntermediateThrowEventBuilder($this->modelInstance, $this);
    }
}
