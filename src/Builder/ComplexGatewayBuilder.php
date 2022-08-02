<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\ComplexGatewayInterface;

class ComplexGatewayBuilder extends AbstractComplexGatewayBuilder
{
    public function __construct(
        BpmnModelInstanceInterface $modelInstance,
        ComplexGatewayInterface $element
    ) {
        parent::__construct($modelInstance, $element, ComplexGatewayBuilder::class);
    }
}
