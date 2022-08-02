<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\{
    ConstraintInterface,
    ValidationInterface
};

class ValidationImpl extends BpmnModelElementInstanceImpl implements ValidationInterface
{
    protected static $constraintCollection;

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            ValidationInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_VALIDATION
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new ValidationImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$constraintCollection = $sequenceBuilder->elementCollection(ConstraintInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getConstraints(): array
    {
        return self::$constraintCollection->get($this);
    }
}
