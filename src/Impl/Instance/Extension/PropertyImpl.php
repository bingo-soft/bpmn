<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\PropertyInterface;

class PropertyImpl extends BpmnModelElementInstanceImpl implements PropertyInterface
{
    protected static $idAttribute;
    protected static $nameAttribute;
    protected static $valueAttribute;

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            PropertyInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_PROPERTY
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new PropertyImpl($instanceContext);
                }
            }
        );

        self::$idAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::EXTENSION_ATTRIBUTE_ID)
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$nameAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::EXTENSION_ATTRIBUTE_NAME)
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$valueAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::EXTENSION_ATTRIBUTE_VALUE)
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        $typeBuilder->build();
    }

    public function getId(): ?string
    {
        return self::$idAttribute->getValue($this);
    }

    public function setId(string $id): void
    {
        self::$idAttribute->setValue($this, $id);
    }

    public function getName(): string
    {
        return self::$nameAttribute->getValue($this);
    }

    public function setName(string $name): void
    {
        self::$nameAttribute->setValue($this, $name);
    }

    public function getValue(): ?string
    {
        return self::$valueAttribute->getValue($this);
    }

    public function setValue(string $value): void
    {
        self::$valueAttribute->setValue($this, $value);
    }
}
