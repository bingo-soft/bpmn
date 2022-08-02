<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\ExclusiveGatewayInterface;

class ExclusiveGatewayBuilder extends AbstractExclusiveGatewayBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        ExclusiveGatewayInterface $element
    ) {
        parent::__construct($modelInstance, $element, ExclusiveGatewayBuilder::class);
    }
}
