<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\{
    BaseElementInterface,
    TransactionInterface
};

class TransactionBuilder extends AbstractTransactionBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        TransactionInterface $element
    ) {
        parent::__construct($modelInstance, $element, TransactionBuilder::class);
    }
}
