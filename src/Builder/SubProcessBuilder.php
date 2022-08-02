<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\{
    BaseElementInterface,
    SubProcessInterface
};

class SubProcessBuilder extends AbstractSubProcessBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        SubProcessInterface $element
    ) {
        parent::__construct($modelInstance, $element, SubProcessBuilder::class);
    }
}
