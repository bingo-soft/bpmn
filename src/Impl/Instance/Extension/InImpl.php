<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\InInterface;

class InImpl extends BpmnModelElementInstanceImpl implements InInterface
{
    protected static $sourceAttribute;
    protected static $sourceExpressionAttribute;
    protected static $variablesAttribute;
    protected static $targetAttribute;
    protected static $businessKeyAttribute;
    protected static $localAttribute;

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            InInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_IN
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new InImpl($instanceContext);
                }
            }
        );

        self::$sourceAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::EXTENSION_ATTRIBUTE_SOURCE)
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$sourceExpressionAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_SOURCE_EXPRESSION
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$variablesAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::EXTENSION_ATTRIBUTE_VARIABLES)
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$targetAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::EXTENSION_ATTRIBUTE_TARGET)
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$businessKeyAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_BUSINESS_KEY
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$localAttribute = $typeBuilder->booleanAttribute(BpmnModelConstants::EXTENSION_ATTRIBUTE_LOCAL)
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        $typeBuilder->build();
    }

    public function getSource(): ?string
    {
        return self::$sourceAttribute->getValue($this);
    }

    public function setSource(string $source): void
    {
        self::$sourceAttribute->setValue($this, $source);
    }

    public function getSourceExpression(): ?string
    {
        return self::$sourceExpressionAttribute->getValue($this);
    }

    public function setSourceExpression(string $sourceExpression): void
    {
        self::$sourceExpressionAttribute->setValue($this, $sourceExpression);
    }

    public function getVariables(): ?string
    {
        return self::$variablesAttribute->getValue($this);
    }

    public function setVariables(string $variables): void
    {
        self::$variablesAttribute->setValue($this, $variables);
    }

    public function getTarget(): string
    {
        return self::$targetAttribute->getValue($this);
    }

    public function setTarget(string $target): void
    {
        self::$targetAttribute->setValue($this, $target);
    }

    public function getBusinessKey(): ?string
    {
        return self::$businessKeyAttribute->getValue($this);
    }

    public function setBusinessKey(string $businessKey): void
    {
        self::$businessKeyAttribute->setValue($this, $businessKey);
    }

    public function getLocal(): bool
    {
        return self::$localAttribute->getValue($this);
    }

    public function setLocal(bool $local): void
    {
        self::$localAttribute->setValue($this, $local);
    }
}
