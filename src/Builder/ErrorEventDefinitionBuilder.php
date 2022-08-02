<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\ErrorEventDefinitionInterface;

class ErrorEventDefinitionBuilder extends AbstractErrorEventDefinitionBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        ErrorEventDefinitionInterface $element
    ) {
        parent::__construct($modelInstance, $element, ErrorEventDefinitionBuilder::class);
    }
}
