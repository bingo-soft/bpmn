<?php

namespace Bpmn\Instance\Di;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface StyleInterface extends BpmnModelElementInstanceInterface
{
    public function getId(): string;

    public function setId(string $id): void;
}
