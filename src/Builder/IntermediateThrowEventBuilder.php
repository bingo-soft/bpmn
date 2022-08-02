<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\IntermediateThrowEventInterface;

class IntermediateThrowEventBuilder extends AbstractIntermediateThrowEventBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        IntermediateThrowEventInterface $element
    ) {
        parent::__construct($modelInstance, $element, IntermediateThrowEventBuilder::class);
    }
}
