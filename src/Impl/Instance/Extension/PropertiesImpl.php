<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\{
    PropertiesInterface,
    PropertyInterface
};

class PropertiesImpl extends BpmnModelElementInstanceImpl implements PropertiesInterface
{
    protected static $propertyCollection;

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            PropertiesInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_PROPERTIES
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new PropertiesImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$propertyCollection = $sequenceBuilder->elementCollection(PropertyInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getProperties(): array
    {
        return self::$propertyCollection->get($this);
    }
}
