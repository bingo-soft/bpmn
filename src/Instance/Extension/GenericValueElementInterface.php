<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface GenericValueElementInterface
{
    public function getValue(): ?BpmnModelElementInstanceInterface;

    public function removeValue(): void;

    public function setValue(BpmnModelElementInstanceInterface $value): void;
}
