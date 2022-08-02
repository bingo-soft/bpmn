<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\BoundaryEventInterface;

class BoundaryEventBuilder extends AbstractBoundaryEventBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        BoundaryEventInterface $element
    ) {
        parent::__construct($modelInstance, $element, BoundaryEventBuilder::class);
    }
}
