<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\Extension\FormFieldInterface;
use Bpmn\Instance\BaseElementInterface;

class StartEventFormFieldBuilder extends AbstractFormFieldBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        BaseElementInterface $parent,
        FormFieldInterface $element
    ) {
        parent::__construct($modelInstance, $parent, $element, StartEventFormFieldBuilder::class);
    }
}
