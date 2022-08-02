<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\{
    BaseElementInterface,
    UserTaskInterface
};

class UserTaskBuilder extends AbstractUserTaskBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        UserTaskInterface $element
    ) {
        parent::__construct($modelInstance, $element, UserTaskBuilder::class);
    }
}
