<?php

namespace Bpmn\Instance\Di;

use Bpmn\Instance\Dc\BoundsInterface;

interface LabelInterface extends NodeInterface
{
    public function getBounds(): BoundsInterface;

    public function setBounds(BoundsInterface $bounds): void;
}
