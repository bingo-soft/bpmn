<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\FailedJobRetryTimeCycleInterface;

class FailedJobRetryTimeCycleImpl extends BpmnModelElementInstanceImpl implements FailedJobRetryTimeCycleInterface
{
    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            FailedJobRetryTimeCycleInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_FAILED_JOB_RETRY_TIME_CYCLE
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new FailedJobRetryTimeCycleImpl($instanceContext);
                }
            }
        );

        $typeBuilder->build();
    }
}
