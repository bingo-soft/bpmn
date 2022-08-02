<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\EndEventInterface;

class EndEventBuilder extends AbstractEndEventBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        EndEventInterface $element
    ) {
        parent::__construct($modelInstance, $element, EndEventBuilder::class);
    }
}
