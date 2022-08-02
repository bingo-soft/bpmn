<?php

namespace Bpmn\Instance;

interface TransactionInterface extends SubProcessInterface
{
    public function getMethod(): string;

    public function setMethod(string $method): void;
}
