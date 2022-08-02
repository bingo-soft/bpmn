<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\SendTaskInterface;

class SendTaskBuilder extends AbstractSendTaskBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        SendTaskInterface $element
    ) {
        parent::__construct($modelInstance, $element, SendTaskBuilder::class);
    }
}
