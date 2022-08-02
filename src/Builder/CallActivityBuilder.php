<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\CallActivityInterface;

class CallActivityBuilder extends AbstractCallActivityBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        CallActivityInterface $element
    ) {
        parent::__construct($modelInstance, $element, CallActivityBuilder::class);
    }
}
