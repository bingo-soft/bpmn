<?php

namespace Bpmn\Instance\Di;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface DiagramElementInterface extends BpmnModelElementInstanceInterface
{
    public function getId(): string;

    public function setId(string $id): void;

    public function getExtension(): ExtensionInterface;

    public function setExtension(ExtensionInterface $extension): void;
}
