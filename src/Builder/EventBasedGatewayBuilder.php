<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\EventBasedGatewayInterface;

class EventBasedGatewayBuilder extends AbstractEventBasedGatewayBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        EventBasedGatewayInterface $element
    ) {
        parent::__construct($modelInstance, $element, EventBasedGatewayBuilder::class);
    }
}
