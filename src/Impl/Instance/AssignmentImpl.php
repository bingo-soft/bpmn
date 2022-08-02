<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    AssignmentInterface,
    BaseElementInterface
};

class AssignmentImpl extends BaseElementImpl implements AssignmentInterface
{
    protected static $fromChild;
    protected static $toChild;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            AssignmentInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_ASSIGNMENT
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(BaseElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new AssignmentImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$fromChild = $sequenceBuilder->element(From::class)
        ->required()
        ->build();

        self::$toChild = $sequenceBuilder->element(To::class)
        ->required()
        ->build();

        $typeBuilder->build();
    }

    public function getFrom(): From
    {
        return self::$fromChild->getChild($this);
    }

    public function setFrom(From $from): void
    {
        self::$fromChild->setChild($this, $from);
    }

    public function getTo(): To
    {
        return self::$toChild->getChild($this);
    }

    public function setTo(To $to): void
    {
        self::$toChild->setChild($this, $to);
    }
}
