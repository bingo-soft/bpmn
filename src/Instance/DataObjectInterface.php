<?php

namespace Bpmn\Instance;

interface DataObjectInterface extends FlowElementInterface, ItemAwareElementInterface
{
    public function isCollection(): bool;

    public function setCollection(bool $isCollection): void;
}
