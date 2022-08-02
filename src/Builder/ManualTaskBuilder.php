<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\ManualTaskInterface;

class ManualTaskBuilder extends AbstractManualTaskBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        ManualTaskInterface $element
    ) {
        parent::__construct($modelInstance, $element, ManualTaskBuilder::class);
    }
}
