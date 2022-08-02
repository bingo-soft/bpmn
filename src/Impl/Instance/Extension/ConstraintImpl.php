<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\ConstraintInterface;

class ConstraintImpl extends BpmnModelElementInstanceImpl implements ConstraintInterface
{
    protected static $nameAttribute;
    protected static $configAttribute;

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            ConstraintInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_CONSTRAINT
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new ConstraintImpl($instanceContext);
                }
            }
        );

        self::$nameAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::EXTENSION_ATTRIBUTE_NAME)
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$configAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::EXTENSION_ATTRIBUTE_CONFIG)
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        $typeBuilder->build();
    }

    public function getName(): string
    {
        return self::$nameAttribute->getValue($this);
    }

    public function setName(string $name): void
    {
        self::$nameAttribute->setValue($this, $name);
    }

    public function getConfig(): string
    {
        return self::$configAttribute->getValue($this);
    }

    public function setConfig(string $config): void
    {
        self::$configAttribute->setValue($this, $config);
    }
}
