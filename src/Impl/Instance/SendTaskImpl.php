<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Bpmn\Builder\SendTaskBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    MessageInterface,
    OperationInterface,
    SendTaskInterface,
    TaskInterface
};

class SendTaskImpl extends TaskImpl implements SendTaskInterface
{
    protected static $implementationAttribute;
    protected static $messageRefAttribute;
    protected static $operationRefAttribute;
    protected static $classAttribute;
    protected static $delegateExpressionAttribute;
    protected static $expressionAttribute;
    protected static $resultVariableAttribute;
    protected static $topicAttribute;
    protected static $typeAttribute;
    protected static $taskPriorityAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            SendTaskInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_SEND_TASK
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(TaskInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new SendTaskImpl($instanceContext);
                }
            }
        );

        self::$implementationAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::BPMN_ATTRIBUTE_IMPLEMENTATION
        )
        ->defaultValue("##WebService")
        ->build();

        self::$messageRefAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_MESSAGE_REF)
        ->qNameAttributeReference(MessageInterface::class)
        ->build();

        self::$operationRefAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_OPERATION_REF)
        ->qNameAttributeReference(OperationInterface::class)
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

        self::$taskPriorityAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_TASK_PRIORITY
        )
        ->namespace(BpmnModelConstants::EXTENSION_NS)
        ->build();

        $typeBuilder->build();
    }

    public function builder(): SendTaskBuilder
    {
        return new SendTaskBuilder($this->modelInstance, $this);
    }

    public function getImplementation(): string
    {
        return self::$implementationAttribute->getValue($this);
    }

    public function setImplementation(string $implementation): void
    {
        self::$implementationAttribute->setValue($this, $implementation);
    }

    public function getMessage(): MessageInterface
    {
        return self::$messageRefAttribute->getReferenceTargetElement($this);
    }

    public function setMessage(MessageInterface $message): void
    {
        self::$messageRefAttribute->setReferenceTargetElement($this, $message);
    }

    public function getOperation(): OperationInterface
    {
        return self::$operationRefAttribute->getReferenceTargetElement($this);
    }

    public function setOperation(OperationInterface $operation): void
    {
        self::$operationRefAttribute->setReferenceTargetElement($this, $operation);
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

    public function getTaskPriority(): string
    {
        return self::$taskPriorityAttribute->getValue($this);
    }

    public function setTaskPriority(string $taskPriority): void
    {
        self::$taskPriorityAttribute->setValue($this, $taskPriority);
    }
}
