<?php

namespace Bpmn\Instance;

use Bpmn\Builder\ParallelGatewayBuilder;

interface ParallelGatewayInterface extends GatewayInterface
{
    public function builder(): ParallelGatewayBuilder;
}
