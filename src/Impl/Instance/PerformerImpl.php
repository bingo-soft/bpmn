<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Exception\BpmnModelException;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    PerformerInterface,
    ResourceRoleInterface
};

class PerformerImpl extends ResourceRoleImpl implements PerformerInterface
{
    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            PerformerInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_PERFORMER
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(ResourceRoleInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new PerformerImpl($instanceContext);
                }
            }
        );

        $typeBuilder->build();
    }
}
