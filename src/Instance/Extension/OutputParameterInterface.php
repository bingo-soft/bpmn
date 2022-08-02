<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface OutputParameterInterface extends BpmnModelElementInstanceInterface, GenericValueElementInterface
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getScript(): ?ScriptInterface;

    public function setScript(ScriptInterface $script): void;

    public function getList(): ?ListInterface;

    public function setList(ListInterface $list): void;

    public function getMap(): ?MapInterface;

    public function setMap(MapInterface $map): void;
}
