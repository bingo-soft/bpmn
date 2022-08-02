<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    CompletionConditionInterface,
    ExpressionInterface
};

class CompletionConditionImpl extends ExpressionImpl implements CompletionConditionInterface
{
    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            CompletionConditionInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_COMPLETION_CONDITION
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(ExpressionInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new CompletionConditionImpl($instanceContext);
                }
            }
        );

        $typeBuilder->build();
    }
}
