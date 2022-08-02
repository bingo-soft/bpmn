<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\InclusiveGatewayInterface;

class InclusiveGatewayBuilder extends AbstractInclusiveGatewayBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        InclusiveGatewayInterface $element
    ) {
        parent::__construct($modelInstance, $element, InclusiveGatewayBuilder::class);
    }
}
