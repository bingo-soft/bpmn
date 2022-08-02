<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    FormalExpressionInterface,
    ItemDefinitionInterface,
    ExpressionInterface
};

class FormalExpressionImpl extends ExpressionImpl implements FormalExpressionInterface
{
    protected static $languageAttribute;
    protected static $evaluatesToTypeRefAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            FormalExpressionInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_FORMAL_EXPRESSION
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(ExpressionInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new FormalExpressionImpl($instanceContext);
                }
            }
        );

        self::$languageAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_LANGUAGE)
        ->build();

        self::$evaluatesToTypeRefAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::BPMN_ATTRIBUTE_EVALUATES_TO_TYPE_REF
        )
        ->qNameAttributeReference(ItemDefinitionInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getLanguage(): ?string
    {
        return self::$languageAttribute->getValue($this);
    }

    public function setLanguage(string $language): void
    {
        self::$languageAttribute->setValue($this, $language);
    }

    public function getEvaluatesToType(): ItemDefinitionInterface
    {
        return self::$evaluatesToTypeRefAttribute->getReferenceTargetElement($this);
    }

    public function setEvaluatesToType(ItemDefinitionInterface $evaluatesToType): void
    {
        self::$evaluatesToTypeRefAttribute->setReferenceTargetElement($this, $evaluatesToType);
    }
}
