<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\EventSubProcessInterface;

class EventSubProcessBuilder extends AbstractEventSubProcessBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        EventSubProcessInterface $element
    ) {
        parent::__construct($modelInstance, $element, EventSubProcessBuilder::class);
    }
}
