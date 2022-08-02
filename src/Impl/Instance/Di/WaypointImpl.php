<?php

namespace Bpmn\Impl\Instance\Di;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\Dc\PointImpl;
use Bpmn\Instance\Dc\PointInterface;
use Bpmn\Instance\Di\WaypointInterface;

class WaypointImpl extends PointImpl implements WaypointInterface
{
    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            WaypointInterface::class,
            BpmnModelConstants::DI_ELEMENT_WAYPOINT
        )
        ->namespaceUri(BpmnModelConstants::DI_NS)
        ->extendsType(PointInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new WaypointImpl($instanceContext);
                }
            }
        );

        $typeBuilder->build();
    }
}
