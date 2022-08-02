<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\MultiInstanceLoopCharacteristicsInterface;

class MultiInstanceLoopCharacteristicsBuilder extends AbstractMultiInstanceLoopCharacteristicsBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        MultiInstanceLoopCharacteristicsInterface $element
    ) {
        parent::__construct($modelInstance, $element, MultiInstanceLoopCharacteristicsBuilder::class);
    }
}
