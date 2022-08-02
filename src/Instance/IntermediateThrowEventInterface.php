<?php

namespace Bpmn\Instance;

use Bpmn\Builder\IntermediateThrowEventBuilder;

interface IntermediateThrowEventInterface extends ThrowEventInterface
{
    public function builder(): IntermediateThrowEventBuilder;
}
