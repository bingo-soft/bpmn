<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    BaseElementInterface,
    DataOutputInterface,
    OutputSetInterface,
    InputSetInterface
};

class OutputSetImpl extends BaseElementImpl implements OutputSetInterface
{
    protected static $nameAttribute;
    protected static $dataOutputDataOutputRefsCollection;
    protected static $optionalOutputRefsCollection;
    protected static $whileExecutingOutputRefsCollection;
    protected static $inputSetInputSetRefsCollection;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            OutputSetInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_OUTPUT_SET
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(BaseElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new OutputSetImpl($instanceContext);
                }
            }
        );

        self::$nameAttribute = $typeBuilder->stringAttribute("name")
        ->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$dataOutputDataOutputRefsCollection = $sequenceBuilder->elementCollection(DataOutputRefs::class)
        ->idElementReferenceCollection(DataOutputInterface::class)
        ->build();

        self::$optionalOutputRefsCollection = $sequenceBuilder->elementCollection(OptionalOutputRefs::class)
        ->idElementReferenceCollection(DataOutputInterface::class)
        ->build();

        self::$whileExecutingOutputRefsCollection = $sequenceBuilder->elementCollection(WhileExecutingOutputRefs::class)
        ->idElementReferenceCollection(DataOutputInterface::class)
        ->build();

        self::$inputSetInputSetRefsCollection = $sequenceBuilder->elementCollection(InputSetRefs::class)
        ->idElementReferenceCollection(InputSetInterface::class)
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

    public function getDataOutputRefs(): array
    {
        return self::$dataOutputDataOutputRefsCollection->getReferenceTargetElements($this);
    }

    public function getOptionalOutputRefs(): array
    {
        return self::$optionalOutputRefsCollection->getReferenceTargetElements($this);
    }

    public function getWhileExecutingOutputRefs(): array
    {
        return self::$whileExecutingOutputRefsCollection->getReferenceTargetElements($this);
    }

    public function getInputSetRefs(): array
    {
        return self::$inputSetInputSetRefsCollection->getReferenceTargetElements($this);
    }
}
