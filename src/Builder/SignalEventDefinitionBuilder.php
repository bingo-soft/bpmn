<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\SignalEventDefinitionInterface;

class SignalEventDefinitionBuilder extends AbstractSignalEventDefinitionBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        SignalEventDefinitionInterface $element
    ) {
        parent::__construct($modelInstance, $element, SignalEventDefinitionBuilder::class);
    }
}
