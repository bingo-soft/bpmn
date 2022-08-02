<?php

namespace Bpmn\Instance;

use Bpmn\Builder\ManualTaskBuilder;

interface ManualTaskInterface extends TaskInterface
{
    public function builder(): ManualTaskBuilder;
}
