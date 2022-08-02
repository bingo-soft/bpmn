<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\ParallelGatewayInterface;

class ParallelGatewayBuilder extends AbstractParallelGatewayBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        ParallelGatewayInterface $element
    ) {
        parent::__construct($modelInstance, $element, ParallelGatewayBuilder::class);
    }
}
