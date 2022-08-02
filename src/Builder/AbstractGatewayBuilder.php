<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\GatewayInterface;

abstract class AbstractGatewayBuilder extends AbstractFlowNodeBuilder
{
    protected function __construct(
        BpmnModelInstanceInterface $modelInstance,
        GatewayInterface $element,
        string $selfType
    ) {
        parent::__construct($modelInstance, $element, $selfType);
    }

    public function gatewayDirection(string $gatewayDirection): AbstractGatewayBuilder
    {
        $this->element->setGatewayDirection($gatewayDirection);
        return $this;
    }
}
