<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\ReceiveTaskInterface;

class ReceiveTaskBuilder extends AbstractReceiveTaskBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        ReceiveTaskInterface $element
    ) {
        parent::__construct($modelInstance, $element, ReceiveTaskBuilder::class);
    }
}
