<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Exception\BpmnModelException;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    HumanPerformerInterface,
    PerformerInterface
};

class HumanPerformerImpl extends PerformerImpl implements HumanPerformerInterface
{
    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            HumanPerformerInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_HUMAN_PERFORMER
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(PerformerInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new HumanPerformerImpl($instanceContext);
                }
            }
        );

        $typeBuilder->build();
    }
}
