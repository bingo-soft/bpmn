<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\CompensateEventDefinitionInterface;

class CompensateEventDefinitionBuilder extends AbstractCompensateEventDefinitionBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        CompensateEventDefinitionInterface $element
    ) {
        parent::__construct($modelInstance, $element, CompensateEventDefinitionBuilder::class);
    }
}
