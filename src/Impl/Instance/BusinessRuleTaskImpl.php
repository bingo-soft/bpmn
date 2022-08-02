<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Bpmn\Builder\BusinessRuleTaskBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    BusinessRuleTaskInterface,
    TaskInterface
};

class BusinessRuleTaskImpl extends TaskImpl implements BusinessRuleTaskInterface
{
    protected static $implementationAttribute;
    protected static $renderingCollection;

    protected static $classAttribute;
    protected static $delegateExpressionAttribute;
    protected static $expressionAttribute;
    protected static $resultVariableAttribute;
    protected static $topicAttribute;
    protected static $typeAttribute;
    protected static $decisionRefAttribute;
    protected static $decisionRefBindingAttribute;
    protected static $decisionRefVersionAttribute;
    protected static $decisionRefVersionTagAttribute;
    protected static $decisionRefTenantIdAttribute;
    protected static $mapDecisionResultAttribute;
    protected static $taskPriorityAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            BusinessRuleTaskInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_BUSINESS_RULE_TASK
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(TaskInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new BusinessRuleTaskImpl($instanceContext);
                }
            }
        );

        self::$implementationAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::BPMN_ATTRIBUTE_IMPLEMENTATION
        )
        ->defaultValue("##unspecified")
        ->build();

        self::$classAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_CLASS
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$delegateExpressionAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_DELEGATE_EXPRESSION
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$expressionAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_EXPRESSION
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$resultVariableAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_RESULT_VARIABLE
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$topicAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_TOPIC
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$typeAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_TYPE
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$decisionRefAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_DECISION_REF
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$decisionRefBindingAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_DECISION_REF_BINDING
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$decisionRefVersionAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_DECISION_REF_VERSION
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$decisionRefVersionTagAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_DECISION_REF_VERSION_TAG
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$decisionRefTenantIdAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_DECISION_REF_TENANT_ID
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$mapDecisionResultAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_MAP_DECISION_RESULT
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        self::$taskPriorityAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_TASK_PRIORITY
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        $typeBuilder->build();
    }

    public function builder(): BusinessRuleTaskBuilder
    {
        return new BusinessRuleTaskBuilder($this->modelInstance, $this);
    }

    public function getImplementation(): string
    {
        return self::$implementationAttribute->getValue($this);
    }

    public function setImplementation(string $implementation): void
    {
        self::$implementationAttribute->setValue($this, $implementation);
    }

    public function getClass(): string
    {
        return self::$classAttribute->getValue($this);
    }

    public function setClass(string $class): void
    {
        self::$classAttribute->setValue($this, $class);
    }

    public function getExpression(): string
    {
        return self::$expressionAttribute->getValue($this);
    }

    public function setExpression(string $expression): void
    {
        self::$expressionAttribute->setValue($this, $expression);
    }

    public function getDelegateExpression(): string
    {
        return self::$delegateExpressionAttribute->getValue($this);
    }

    public function setDelegateExpression(string $expression): void
    {
        self::$delegateExpressionAttribute->setValue($this, $expression);
    }

    public function getResultVariable(): string
    {
        return self::$resultVariableAttribute->getValue($this);
    }

    public function setResultVariable(string $resultVariable): void
    {
        self::$resultVariableAttribute->setValue($this, $resultVariable);
    }

    public function getTopic(): string
    {
        return self::$topicAttribute->getValue($this);
    }

    public function setTopic(string $topic): void
    {
        self::$topicAttribute->setValue($this, $topic);
    }

    public function getType(): string
    {
        return self::$typeAttribute->getValue($this);
    }

    public function setType(string $type): void
    {
        self::$typeAttribute->setValue($this, $type);
    }

    public function getDecisionRef(): string
    {
        return self::$decisionRefAttribute->getValue($this);
    }

    public function setDecisionRef(string $decisionRef): void
    {
        self::$decisionRefAttribute->setValue($this, $decisionRef);
    }

    public function getDecisionRefBinding(): string
    {
        return self::$decisionRefBindingAttribute->getValue($this);
    }

    public function setDecisionRefBinding(string $decisionRefBinding): void
    {
        self::$decisionRefBindingAttribute->setValue($this, $decisionRefBinding);
    }

    public function getDecisionRefVersion(): string
    {
        return self::$decisionRefVersionAttribute->getValue($this);
    }

    public function setDecisionRefVersion(string $decisionRefVersion): void
    {
        self::$decisionRefVersionAttribute->setValue($this, $decisionRefVersion);
    }

    public function getDecisionRefVersionTag(): string
    {
        return self::$decisionRefVersionTagAttribute->getValue($this);
    }

    public function setDecisionRefVersionTag(string $decisionRefVersionTag): void
    {
        self::$decisionRefVersionTagAttribute->setValue($this, $decisionRefVersionTag);
    }

    public function getDecisionRefTenantId(): string
    {
        return self::$decisionRefTenantIdAttribute->getValue($this);
    }

    public function setDecisionRefTenantId(string $decisionRefTenantId): void
    {
        self::$decisionRefTenantIdAttribute->setValue($this, $decisionRefTenantId);
    }

    public function getMapDecisionResult(): string
    {
        return self::$mapDecisionResultAttribute->getValue($this);
    }

    public function setMapDecisionResult(string $mapDecisionResult): void
    {
        self::$mapDecisionResultAttribute->setValue($this, $mapDecisionResult);
    }

    public function getTaskPriority(): string
    {
        return self::$taskPriorityAttribute->getValue($this);
    }

    public function setTaskPriority(string $taskPriority): void
    {
        self::$taskPriorityAttribute->setValue($this, $taskPriority);
    }
}
