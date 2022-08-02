<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface MapInterface extends BpmnModelElementInstanceInterface
{
    public function getEntries(): array;

    public function addEntry(EntryInterface $entry): void;
}
