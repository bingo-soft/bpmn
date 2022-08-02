<?php

namespace Bpmn\Instance;

interface FormalExpressionInterface extends ExpressionInterface
{
    public function getLanguage(): ?string;

    public function setLanguage(string $language): void;

    public function getEvaluatesToType(): ItemDefinitionInterface;

    public function setEvaluatesToType(ItemDefinitionInterface $evaluatesToType): void;
}
