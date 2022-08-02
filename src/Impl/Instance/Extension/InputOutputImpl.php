<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\{
    InputOutputInterface,
    InputParameterInterface,
    OutputParameterInterface
};

class InputOutputImpl extends BpmnModelElementInstanceImpl implements InputOutputInterface
{
    protected static $inputParameterCollection;
    protected static $outputParameterCollection;

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            InputOutputInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_INPUT_OUTPUT
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new InputOutputImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$inputParameterCollection = $sequenceBuilder->elementCollection(InputParameterInterface::class)
        ->build();

        self::$outputParameterCollection = $sequenceBuilder->elementCollection(OutputParameterInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getInputParameters(): array
    {
        return self::$inputParameterCollection->get($this);
    }

    public function getOutputParameters(): array
    {
        return self::$outputParameterCollection->get($this);
    }
}
