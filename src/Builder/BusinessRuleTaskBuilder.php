<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\BusinessRuleTaskInterface;

class BusinessRuleTaskBuilder extends AbstractBusinessRuleTaskBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        BusinessRuleTaskInterface $element
    ) {
        parent::__construct($modelInstance, $element, BusinessRuleTaskBuilder::class);
    }
}
