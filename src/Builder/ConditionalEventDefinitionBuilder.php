<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\ConditionalEventDefinitionInterface;

class ConditionalEventDefinitionBuilder extends AbstractConditionalEventDefinitionBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        ConditionalEventDefinitionInterface $element
    ) {
        parent::__construct($modelInstance, $element, ConditionalEventDefinitionBuilder::class);
    }
}
