<?php

namespace Bpmn\Instance\Bpmndi;

use Bpmn\Instance\Dc\FontInterface;
use Bpmn\Instance\Di\StyleInterface;

interface BpmnLabelStyleInterface extends StyleInterface
{
    public function getFont(): FontInterface;

    public function setFont(FontInterface $font): void;
}
