<?php

namespace Bpmn\Builder;

use Bpmn\Exception\BpmnModelException;
use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\EventBasedGatewayInterface;

abstract class AbstractEventBasedGatewayBuilder extends AbstractGatewayBuilder
{
    protected function __construct(
        BpmnModelInstanceInterface $modelInstance,
        EventBasedGatewayInterface $element,
        string $selfType
    ) {
        parent::__construct($modelInstance, $element, $selfType);
    }

    public function instantiate(): AbstractEventBasedGatewayBuilder
    {
        $this->element->setInstantiate(true);
        return $this;
    }

    public function eventGatewayType(string $eventGatewayType): AbstractEventBasedGatewayBuilder
    {
        $this->element->setEventGatewayType($eventGatewayType);
        return $this;
    }

    public function asyncAfter(bool $isAsyncAfter = true): AbstractEventBasedGatewayBuilder
    {
        throw new \Exception("'asyncAfter' is not supported for 'Event Based Gateway'");
    }
}
