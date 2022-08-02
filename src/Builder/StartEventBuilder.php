<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\StartEventInterface;

class StartEventBuilder extends AbstractStartEventBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        StartEventInterface $element
    ) {
        parent::__construct($modelInstance, $element, StartEventBuilder::class);
    }
}
