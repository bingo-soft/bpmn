<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\ServiceTaskInterface;

class ServiceTaskBuilder extends AbstractServiceTaskBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        ServiceTaskInterface $element
    ) {
        parent::__construct($modelInstance, $element, ServiceTaskBuilder::class);
    }
}
