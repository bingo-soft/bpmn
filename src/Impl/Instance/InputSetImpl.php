<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    BaseElementInterface,
    DataInputInterface,
    InputSetInterface,
    OutputSetInterface
};

class InputSetImpl extends BaseElementImpl implements InputSetInterface
{
    protected static $nameAttribute;
    protected static $dataInputDataInputRefsCollection;
    protected static $optionalInputRefsCollection;
    protected static $whileExecutingInputRefsCollection;
    protected static $outputSetOutputSetRefsCollection;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            InputSetInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_INPUT_SET
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(BaseElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new InputSetImpl($instanceContext);
                }
            }
        );

        self::$nameAttribute = $typeBuilder->stringAttribute("name")
        ->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$dataInputDataInputRefsCollection = $sequenceBuilder->elementCollection(DataInputRefs::class)
        ->idElementReferenceCollection(DataInputInterface::class)
        ->build();

        self::$optionalInputRefsCollection = $sequenceBuilder->elementCollection(OptionalInputRefs::class)
        ->idElementReferenceCollection(DataInputInterface::class)
        ->build();

        self::$whileExecutingInputRefsCollection = $sequenceBuilder->elementCollection(WhileExecutingInputRefs::class)
        ->idElementReferenceCollection(DataInputInterface::class)
        ->build();

        self::$outputSetOutputSetRefsCollection = $sequenceBuilder->elementCollection(OutputSetRefs::class)
        ->idElementReferenceCollection(OutputSetInterface::class)
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

    public function getDataInputs(): array
    {
        return self::$dataInputDataInputRefsCollection->getReferenceTargetElements($this);
    }

    public function getOptionalInputs(): array
    {
        return self::$optionalInputRefsCollection->getReferenceTargetElements($this);
    }

    public function getWhileExecutingInput(): array
    {
        return self::$whileExecutingInputRefsCollection->getReferenceTargetElements($this);
    }

    public function getOutputSets(): array
    {
        return self::$outputSetOutputSetRefsCollection->getReferenceTargetElements($this);
    }
}
