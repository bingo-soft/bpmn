<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    BaseElementInterface,
    ExpressionInterface,
    ResourceAssignmentExpressionInterface
};

class ResourceAssignmentExpressionImpl extends BaseElementImpl implements ResourceAssignmentExpressionInterface
{
    protected static $expressionChild;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            ResourceAssignmentExpressionInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_RESOURCE_ASSIGNMENT_EXPRESSION
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(BaseElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new ResourceAssignmentExpressionImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$expressionChild = $sequenceBuilder->element(ExpressionInterface::class)
        ->required()
        ->build();

        $typeBuilder->build();
    }

    public function getExpression(): ExpressionInterface
    {
        return self::$expressionChild->getChild($this);
    }

    public function setExpression(ExpressionInterface $expression): void
    {
        self::$expressionChild->setChild($this, $expression);
    }
}
