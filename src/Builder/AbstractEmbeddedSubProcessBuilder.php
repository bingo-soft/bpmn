<?php

namespace Bpmn\Builder;

abstract class AbstractEmbeddedSubProcessBuilder
{
    protected $subProcessBuilder;

    protected function __construct(AbstractSubProcessBuilder $subProcessBuilder, string $selfType)
    {
        $this->subProcessBuilder = $subProcessBuilder;
    }
}
