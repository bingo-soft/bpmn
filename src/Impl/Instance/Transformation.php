<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Instance\FormalExpressionInterface;
use Bpmn\Impl\BpmnModelConstants;

class Transformation extends FormalExpressionImpl
{
    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            Transformation::class,
            BpmnModelConstants::BPMN_ELEMENT_TRANSFORMATION
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(FormalExpressionInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new Transformation($instanceContext);
                }
            }
        );

        $typeBuilder->build();
    }
}
