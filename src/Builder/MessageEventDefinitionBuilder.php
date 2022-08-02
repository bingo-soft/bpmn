<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\MessageEventDefinitionInterface;

class MessageEventDefinitionBuilder extends AbstractMessageEventDefinitionBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        MessageEventDefinitionInterface $element
    ) {
        parent::__construct($modelInstance, $element, MessageEventDefinitionBuilder::class);
    }
}
