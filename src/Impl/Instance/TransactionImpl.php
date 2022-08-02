<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\TransactionMethod;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    SubProcessInterface,
    TransactionInterface
};

class TransactionImpl extends SubProcessImpl implements TransactionInterface
{
    protected static $methodAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            TransactionInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_TRANSACTION
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(SubProcessInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new TransactionImpl($instanceContext);
                }
            }
        );

        self::$methodAttribute = $typeBuilder->namedEnumAttribute(
            BpmnModelConstants::BPMN_ATTRIBUTE_METHOD,
            TransactionMethod::class
        )
        ->defaultValue(TransactionMethod::COMPENSATE)
        ->build();

        $typeBuilder->build();
    }

    public function getMethod(): string
    {
        return self::$methodAttribute->getValue($this);
    }

    public function setMethod(string $method): void
    {
        self::$methodAttribute->setValue($this, $method);
    }
}
