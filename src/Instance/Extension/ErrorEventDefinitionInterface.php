<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\ErrorEventDefinitionInterface as BaseErrorEventDefinitionInterface;

interface ErrorEventDefinitionInterface extends BaseErrorEventDefinitionInterface
{
    public function getExpression(): string;

    public function setExpression(string $expression): void;
}
