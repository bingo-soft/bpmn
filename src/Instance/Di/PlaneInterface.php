<?php

namespace Bpmn\Instance\Di;

interface PlaneInterface extends NodeInterface
{
    public function getDiagramElements(): array;

    public function addDiagramElement(DiagramElementInterface $element): void;
}
