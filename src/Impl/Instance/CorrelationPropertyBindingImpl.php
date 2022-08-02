<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    BaseElementInterface,
    CorrelationPropertyInterface,
    CorrelationPropertyBindingInterface
};

class CorrelationPropertyBindingImpl extends BaseElementImpl implements CorrelationPropertyBindingInterface
{
    protected static $correlationPropertyRefAttribute;
    protected static $dataPathChild;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            CorrelationPropertyBindingInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_CORRELATION_PROPERTY_BINDING
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(BaseElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new CorrelationPropertyBindingImpl($instanceContext);
                }
            }
        );

        self::$correlationPropertyRefAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::BPMN_ATTRIBUTE_CORRELATION_PROPERTY_REF
        )
        ->required()
        ->qNameAttributeReference(CorrelationPropertyInterface::class)
        ->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$dataPathChild = $sequenceBuilder->element(DataPath::class)
        ->required()
        ->build();

        $typeBuilder->build();
    }

    public function getCorrelationProperty(): CorrelationPropertyInterface
    {
        return self::$correlationPropertyRefAttribute->getReferenceTargetElement($this);
    }

    public function setCorrelationProperty(CorrelationPropertyInterface $correlationProperty): void
    {
        self::$correlationPropertyRefAttribute->setReferenceTargetElement($this, $correlationProperty);
    }

    public function getDataPath(): DataPath
    {
        return self::$dataPathChild->getChild($this);
    }

    public function setDataPath(DataPath $dataPath): void
    {
        self::$dataPathChild->setChild($this, $dataPath);
    }
}
