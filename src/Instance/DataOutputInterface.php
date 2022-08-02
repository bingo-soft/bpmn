<?php

namespace Bpmn\Instance;

interface DataOutputInterface extends ItemAwareElementInterface
{
    public function getName(): string;

    public function setName(string $name): void;

    public function isCollection(): bool;

    public function setCollection(bool $isCollection): void;
}
