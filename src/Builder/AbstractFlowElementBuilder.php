<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\FlowElementInterface;

abstract class AbstractFlowElementBuilder extends AbstractBaseElementBuilder
{
    protected function __construct(
        BpmnModelInstanceInterface $modelInstance,
        FlowElementInterface $element,
        string $selfType
    ) {
        parent::__construct($modelInstance, $element, $selfType);
    }

    public function name(string $name): AbstractFlowElementBuilder
    {
        $this->element->setName($name);
        return $this;
    }
}
