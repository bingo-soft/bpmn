<?php

namespace Bpmn\Instance;

interface EscalationEventDefinitionInterface extends EventDefinitionInterface
{
    public function getEscalation(): ?EscalationInterface;

    public function setEscalation(EscalationInterface $escalation): void;
}
