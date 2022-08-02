<?php

namespace Bpmn\Instance;

use Bpmn\Builder\IntermediateCatchEventBuilder;

interface IntermediateCatchEventInterface extends CatchEventInterface
{
    public function builder(): IntermediateCatchEventBuilder;
}
