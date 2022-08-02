<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Bpmn\Builder\ManualTaskBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    ManualTaskInterface,
    TaskInterface
};

class ManualTaskImpl extends TaskImpl implements ManualTaskInterface
{
    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            ManualTaskInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_MANUAL_TASK
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(TaskInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new ManualTaskImpl($instanceContext);
                }
            }
        );

        $typeBuilder->build();
    }

    public function builder(): ManualTaskBuilder
    {
        return new ManualTaskBuilder($this->modelInstance, $this);
    }
}
