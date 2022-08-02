<?php

namespace Bpmn\Instance;

use Bpmn\QueryInterface;
use Xml\Instance\ModelElementInstanceInterface;

interface ExtensionElementsInterface extends BpmnModelElementInstanceInterface
{
    public function getElements(): array;

    public function getElementsQuery(): QueryInterface;

    public function addExtensionElement(string $extensionElementClass): ModelElementInstanceInterface;

    public function addExtensionElementNs(
        string $namespaceUriOrElementClass,
        string $localName
    ): ModelElementInstanceInterface;
}
