<?php

namespace Bpmn\Instance;

interface CategoryValueInterface extends BaseElementInterface
{
    public function getValue(): string;

    public function setValue(string $value): void;
}
