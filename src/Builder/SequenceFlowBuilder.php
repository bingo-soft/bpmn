<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\SequenceFlowInterface;

class SequenceFlowBuilder extends AbstractSequenceFlowBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        SequenceFlowInterface $element
    ) {
        parent::__construct($modelInstance, $element, SequenceFlowBuilder::class);
    }
}
