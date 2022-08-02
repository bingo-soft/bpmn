<?php

namespace Bpmn\Instance;

use Bpmn\Builder\ExclusiveGatewayBuilder;

interface ExclusiveGatewayInterface extends GatewayInterface
{
    public function builder(): ExclusiveGatewayBuilder;

    public function getDefault(): SequenceFlowInterface;

    public function setDefault(SequenceFlowInterface $defaultFlow): void;
}
