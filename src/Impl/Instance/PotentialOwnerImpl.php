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
    PotentialOwnerInterface
};

class PotentialOwnerImpl extends HumanPerformerImpl implements PotentialOwnerInterface
{
    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            PotentialOwnerInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_POTENTIAL_OWNER
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(HumanPerformerInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new PotentialOwnerImpl($instanceContext);
                }
            }
        );

        $typeBuilder->build();
    }
}
