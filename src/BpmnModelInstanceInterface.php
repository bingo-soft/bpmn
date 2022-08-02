<?php

namespace Bpmn;

use Bpmn\Instance\DefinitionsInterface;
use Xml\ModelInstanceInterface;

interface BpmnModelInstanceInterface extends ModelInstanceInterface
{
    public function getDefinitions(): ?DefinitionsInterface;

    public function setDefinitions(DefinitionsInterface $definitions): void;

    public function clone(): BpmnModelInstanceInterface;
}
