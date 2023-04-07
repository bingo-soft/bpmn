<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\SubProcessInterface;

class EventSubProcessBuilder extends AbstractEventSubProcessBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        SubProcessInterface $element
    ) {
        parent::__construct($modelInstance, $element, EventSubProcessBuilder::class);
    }
}
