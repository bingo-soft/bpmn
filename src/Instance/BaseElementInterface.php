<?php

namespace Bpmn\Instance;

use Bpmn\Instance\Di\DiagramElementInterface;

interface BaseElementInterface extends BpmnModelElementInstanceInterface
{
    public function getId(): ?string;

    public function setId(string $id): void;

    public function getDocumentations(): array;

    public function getExtensionElements(): ?ExtensionElementsInterface;

    public function setExtensionElements(ExtensionElementsInterface $extensionElements): void;

    public function getDiagramElement(): ?DiagramElementInterface;
}
