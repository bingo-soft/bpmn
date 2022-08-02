<?php

namespace Bpmn\Impl\Instance\Dc;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Dc\BoundsInterface;

class BoundsImpl extends BpmnModelElementInstanceImpl implements BoundsInterface
{
    protected static $xAttribute;
    protected static $yAttribute;
    protected static $widthAttribute;
    protected static $heightAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            BoundsInterface::class,
            BpmnModelConstants::DC_ELEMENT_BOUNDS
        )
        ->namespaceUri(BpmnModelConstants::DC_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new BoundsImpl($instanceContext);
                }
            }
        );

        self::$xAttribute = $typeBuilder->doubleAttribute(BpmnModelConstants::DC_ATTRIBUTE_X)
        ->required()
        ->build();

        self::$yAttribute = $typeBuilder->doubleAttribute(BpmnModelConstants::DC_ATTRIBUTE_Y)
        ->required()
        ->build();

        self::$widthAttribute = $typeBuilder->doubleAttribute(BpmnModelConstants::DC_ATTRIBUTE_WIDTH)
        ->required()
        ->build();

        self::$heightAttribute = $typeBuilder->doubleAttribute(BpmnModelConstants::DC_ATTRIBUTE_HEIGHT)
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

    public function getWidth(): float
    {
        return self::$widthAttribute->getValue($this);
    }

    public function setWidth(float $width): void
    {
        self::$widthAttribute->setValue($this, $width);
    }

    public function getHeight(): float
    {
        return self::$heightAttribute->getValue($this);
    }

    public function setHeight(float $height): void
    {
        self::$heightAttribute->setValue($this, $height);
    }
}
