<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\ScriptTaskInterface;

class ScriptTaskBuilder extends AbstractScriptTaskBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        ScriptTaskInterface $element
    ) {
        parent::__construct($modelInstance, $element, ScriptTaskBuilder::class);
    }
}
