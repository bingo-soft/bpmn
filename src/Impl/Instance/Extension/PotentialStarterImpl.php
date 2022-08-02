<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\ResourceAssignmentExpressionInterface;
use Bpmn\Instance\Extension\PotentialStarterInterface;

class PotentialStarterImpl extends BpmnModelElementInstanceImpl implements PotentialStarterInterface
{
    protected static $resourceAssignmentExpressionChild;

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            PotentialStarterInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_POTENTIAL_STARTER
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new PotentialStarterImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$resourceAssignmentExpressionChild = $sequenceBuilder->element(
            ResourceAssignmentExpressionInterface::class
        )
        ->build();

        $typeBuilder->build();
    }

    public function getResourceAssignmentExpression(): ResourceAssignmentExpressionInterface
    {
        return self::$resourceAssignmentExpressionChild->getChild($this);
    }

    public function setResourceAssignmentExpression(
        ResourceAssignmentExpressionInterface $resourceAssignmentExpression
    ): void {
        self::$resourceAssignmentExpressionChild->setChild($this, $resourceAssignmentExpression);
    }
}
