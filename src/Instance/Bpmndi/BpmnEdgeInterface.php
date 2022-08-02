<?php

namespace Bpmn\Instance\Bpmndi;

use Bpmn\Instance\BaseElementInterface;
use Bpmn\Instance\Di\{
    DiagramElementInterface,
    LabeledEdgeInterface
};

interface BpmnEdgeInterface extends LabeledEdgeInterface
{
    public function getBpmnElement(): BaseElementInterface;

    public function setBpmnElement(BaseElementInterface $bpmnElement): void;

    public function getSourceElement(): DiagramElementInterface;

    public function setSourceElement(DiagramElementInterface $sourceElement): void;

    public function getTargetElement(): DiagramElementInterface;

    public function setTargetElement(DiagramElementInterface $targetElement): void;

    public function getMessageVisibleKind(): ?string;

    public function setMessageVisibleKind(string $messageVisibleKind): void;

    public function getBpmnLabel(): ?BpmnLabelInterface;

    public function setBpmnLabel(BpmnLabelInterface $bpmnLabel): void;
}
