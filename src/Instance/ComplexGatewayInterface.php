<?php

namespace Bpmn\Instance;

use Bpmn\Builder\ComplexGatewayBuilder;

interface ComplexGatewayInterface extends GatewayInterface
{
    public function builder(): ComplexGatewayBuilder;

    public function getDefault(): SequenceFlowInterface;

    public function setDefault(SequenceFlowInterface $defaultFlow): void;

    public function getActivationCondition(): ActivationConditionInterface;

    public function setActivationCondition(ActivationConditionInterface $activationCondition): void;
}
