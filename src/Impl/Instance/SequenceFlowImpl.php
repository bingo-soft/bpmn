<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Builder\SequenceFlowBuilder;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    ConditionExpressionInterface,
    SequenceFlowInterface,
    FlowElementInterface,
    FlowNodeInterface
};
use Bpmn\Instance\Bpmndi\BpmnEdgeInterface;

class SequenceFlowImpl extends FlowElementImpl implements SequenceFlowInterface
{
    protected static $sourceRefAttribute;
    protected static $targetRefAttribute;
    protected static $isImmediateAttribute;
    protected static $conditionExpressionCollection;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            SequenceFlowInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_SEQUENCE_FLOW
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(FlowElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new SequenceFlowImpl($instanceContext);
                }
            }
        );

        self::$sourceRefAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_SOURCE_REF)
        ->required()
        ->idAttributeReference(FlowNodeInterface::class)
        ->build();

        self::$targetRefAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_TARGET_REF)
        ->required()
        ->idAttributeReference(FlowNodeInterface::class)
        ->build();

        self::$isImmediateAttribute = $typeBuilder->booleanAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_IS_IMMEDIATE)
        ->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$conditionExpressionCollection = $sequenceBuilder->element(ConditionExpressionInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function builder(): SequenceFlowBuilder
    {
        return new SequenceFlowBuilder($this->modelInstance, $this);
    }

    public function getSource(): FlowNodeInterface
    {
        return self::$sourceRefAttribute->getReferenceTargetElement($this);
    }

    public function setSource(FlowNodeInterface $source): void
    {
        self::$sourceRefAttribute->setReferenceTargetElement($this, $source);
    }

    public function getTarget(): FlowNodeInterface
    {
        return self::$targetRefAttribute->getReferenceTargetElement($this);
    }

    public function setTarget(FlowNodeInterface $target): void
    {
        self::$targetRefAttribute->setReferenceTargetElement($this, $target);
    }

    public function isImmediate(): bool
    {
        return self::$isImmediateAttribute->getValue($this);
    }

    public function setImmediate(bool $isImmediate): void
    {
        self::$isImmediateAttribute->setValue($this, $isImmediate);
    }

    public function getConditionExpression(): ConditionExpressionInterface
    {
        return self::$conditionExpressionCollection->getChild($this);
    }

    public function setConditionExpression(ConditionExpressionInterface $conditionExpression): void
    {
        self::$conditionExpressionCollection->setChild($this, $conditionExpression);
    }

    public function removeConditionExpression(): void
    {
        self::$conditionExpressionCollection->removeChild($this);
    }

    public function getDiagramElement(): ?BpmnEdgeInterface
    {
        return parent::getDiagramElement();
    }
}
