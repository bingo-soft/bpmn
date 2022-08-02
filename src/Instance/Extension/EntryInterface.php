<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface EntryInterface extends BpmnModelElementInstanceInterface, GenericValueElementInterface
{
    public function getKey(): string;

    public function setKey(string $key): void;
}
