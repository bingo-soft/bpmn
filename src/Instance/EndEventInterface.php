<?php

namespace Bpmn\Instance;

use Bpmn\Builder\EndEventBuilder;

interface EndEventInterface extends ThrowEventInterface
{
    public function builder(): EndEventBuilder;
}
