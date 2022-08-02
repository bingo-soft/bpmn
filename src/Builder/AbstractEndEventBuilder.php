<?php

namespace Bpmn\Builder;

use Bpmn\Exception\BpmnModelException;
use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\EndEventInterface;

abstract class AbstractEndEventBuilder extends AbstractThrowEventBuilder
{
    protected function __construct(
        BpmnModelInstanceInterface $modelInstance,
        EndEventInterface $element,
        string $selfType
    ) {
        parent::__construct($modelInstance, $element, $selfType);
    }

    public function error(string $errorCode, ?string $errorMessage = null): AbstractEndEventBuilder
    {
        $errorEventDefinition = $this->createErrorEventDefinition($errorCode, $errorMessage);
        $this->element->addEventDefinition($errorEventDefinition);
        return $this;
    }
}
