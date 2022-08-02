<?php

namespace Bpmn\Impl\Instance\Dc;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Dc\PointInterface;

class PointImpl extends BpmnModelElementInstanceImpl implements PointInterface
{
    protected static $xAttribute;
    protected static $yAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            PointInterface::class,
            BpmnModelConstants::DC_ELEMENT_POINT
        )
        ->namespaceUri(BpmnModelConstants::DC_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new PointImpl($instanceContext);
                }
            }
        );

        self::$xAttribute = $typeBuilder->doubleAttribute(BpmnModelConstants::DC_ATTRIBUTE_X)
        ->required()
        ->build();

        self::$yAttribute = $typeBuilder->doubleAttribute(BpmnModelConstants::DC_ATTRIBUTE_Y)
        ->required()
        ->build();

        $typeBuilder->build();
    }

    public function getX(): float
    {
        return self::$xAttribute->getValue($this);
    }

    public function setX(float $x): void
    {
        self::$xAttribute->setValue($this, $x);
    }

    public function getY(): float
    {
        return self::$yAttribute->getValue($this);
    }

    public function setY(float $y): void
    {
        self::$yAttribute->setValue($this, $y);
    }
}
