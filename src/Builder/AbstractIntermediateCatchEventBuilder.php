<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\IntermediateCatchEventInterface;

abstract class AbstractIntermediateCatchEventBuilder extends AbstractCatchEventBuilder
{
    protected function __construct(
        BpmnModelInstanceInterface $modelInstance,
        IntermediateCatchEventInterface $element,
        string $selfType
    ) {
        parent::__construct($modelInstance, $element, $selfType);
    }
}
