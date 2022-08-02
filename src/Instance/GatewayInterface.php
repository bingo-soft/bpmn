<?php

namespace Bpmn\Instance;

use Bpmn\Builder\AbstractGatewayBuilder;
use Bpmn\Instance\Bpmndi\BpmnShapeInterface;

interface GatewayInterface extends FlowNodeInterface
{
    public function builder(): AbstractGatewayBuilder;

    public function getGatewayDirection(): string;

    public function setGatewayDirection(string $gatewayDirection): void;

    public function getDiagramElement(): BpmnShapeInterface;
}
