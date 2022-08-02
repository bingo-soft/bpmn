<?php

namespace Bpmn\Builder;

use Bpmn\BpmnModelInstanceInterface;
use Bpmn\Instance\Bpmndi\BpmnShapeInterface;
use Bpmn\Instance\{
    StartEventInterface,
    SubProcessInterface
};

class EmbeddedSubProcessBuilder extends AbstractEmbeddedSubProcessBuilder
{
    public function __construct(
        AbstractSubProcessBuilder $subProcessBuilder
    ) {
        parent::__construct($subProcessBuilder, EmbeddedSubProcessBuilder::class);
    }

    public function startEvent(?string $id = null): StartEventBuilder
    {
        $start = $this->subProcessBuilder->createChild(null, StartEventInterface::class, $id);
        $startShape = $this->subProcessBuilder->createBpmnShape($start);
        $subProcessShape = $this->subProcessBuilder->findBpmnShape($this->subProcessBuilder->getElement());

        if ($subProcessShape !== null) {
            $subProcessBounds = $subProcessShape->getBounds();
            $startBounds = $startShape->getBounds();

            $subProcessX = $subProcessBounds->getX();
            $subProcessY = $subProcessBounds->getY();
            $subProcessHeight = $subProcessBounds->getHeight();
            $startHeight = $startBounds->getHeight();

            $startBounds->setX($subProcessX + AbstractBaseElementBuilder::SPACE);
            $startBounds->setY($subProcessY + $subProcessHeight / 2 - $startHeight / 2);
        }

        return $start->builder();
    }

    public function eventSubProcess(?string $id = null): EventSubProcessBuilder
    {
        $subProcess = $this->subProcessBuilder->createChild(SubProcessInterface::class, $id);
        $subProcess->setTriggeredByEvent(true);

        // Create Bpmn shape so subprocess will be drawn
        $targetBpmnShape = $this->subProcessBuilder->createBpmnShape($subProcess);
        //find the lowest shape in the process
        // place event sub process underneath
        $this->setCoordinates($targetBpmnShape);

        $this->subProcessBuilder->resizeSubProcess($targetBpmnShape);

        // Return the eventSubProcessBuilder
        $eventSubProcessBuilder = new EventSubProcessBuilder($subProcessBuilder->modelInstance, $subProcess);
        return $eventSubProcessBuilder;
    }

    protected function setCoordinates(BpmnShapeInterface $targetBpmnShape): void
    {
        $eventSubProcess = $targetBpmnShape->getBpmnElement();
        $parentSubProcess = $eventSubProcess->getParentElement();
        $parentBpmnShape = $subProcessBuilder->findBpmnShape($parentSubProcess);

        $targetBounds = $targetBpmnShape->getBounds();
        $parentBounds = $parentBpmnShape->getBounds();

        $ycoord = $parentBounds->getHeight() + $parentBounds->getY();
        $xcoord = ($parentBounds->getWidth() / 2) - ($targetBounds->getWidth() / 2) + $parentBounds->getX();

        if ($xcoord - $parentBounds->getX() < 50.0) {
            $xcoord = 50.0 + $parentBounds->getX();
        }

        $targetBounds->setY($ycoord);
        $targetBounds->setX($xcoord);
    }
}
