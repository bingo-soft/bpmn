<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\{
    ExclusiveGatewayInterface,
    SequenceFlowInterface
};

abstract class AbstractExclusiveGatewayBuilder extends AbstractGatewayBuilder
{
    protected function __construct(
        BpmnModelInstanceInterface $modelInstance,
        ExclusiveGatewayInterface $element,
        string $selfType
    ) {
        parent::__construct($modelInstance, $element, $selfType);
    }

    public function defaultFlow(SequenceFlowInterface $sequenceFlow): AbstractExclusiveGatewayBuilder
    {
        $this->element->setDefault($sequenceFlow);
        return $this;
    }
}
