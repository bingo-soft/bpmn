<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\IntermediateCatchEventInterface;

class IntermediateCatchEventBuilder extends AbstractIntermediateCatchEventBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        IntermediateCatchEventInterface $element
    ) {
        parent::__construct($modelInstance, $element, IntermediateCatchEventBuilder::class);
    }
}
