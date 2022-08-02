<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Builder\ErrorEventDefinitionBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    ErrorEventDefinitionInterface,
    ErrorInterface,
    EventDefinitionInterface
};

class ErrorEventDefinitionImpl extends EventDefinitionImpl implements ErrorEventDefinitionInterface
{
    protected static $errorRefAttribute;
    protected static $errorCodeVariableAttribute;
    protected static $errorMessageVariableAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            ErrorEventDefinitionInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_ERROR_EVENT_DEFINITION
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(EventDefinitionInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new ErrorEventDefinitionImpl($instanceContext);
                }
            }
        );

        self::$errorRefAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_ERROR_REF)
        ->qNameAttributeReference(ErrorInterface::class)
        ->build();

        self::$errorCodeVariableAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_ERROR_CODE_VARIABLE
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$errorMessageVariableAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_ERROR_MESSAGE_VARIABLE
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        $typeBuilder->build();
    }

    public function getError(): ?ErrorInterface
    {
        return self::$errorRefAttribute->getReferenceTargetElement($this);
    }

    public function setError(ErrorInterface $error): void
    {
        self::$errorRefAttribute->setReferenceTargetElement($this, $error);
    }

    public function getErrorCodeVariable(): string
    {
        return self::$errorCodeVariableAttribute->getValue($this);
    }

    public function setErrorCodeVariable(string $errorCodeVariable): void
    {
        self::$errorCodeVariableAttribute->setValue($this, $errorCodeVariable);
    }

    public function getErrorMessageVariable(): string
    {
        return self::$errorMessageVariableAttribute->getValue($this);
    }

    public function setErrorMessageVariable(string $errorMessageVariable): void
    {
        self::$errorMessageVariableAttribute->setValue($this, $errorMessageVariable);
    }
}
