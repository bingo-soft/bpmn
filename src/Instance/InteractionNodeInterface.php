<?php

namespace Bpmn\Instance;

use Xml\Instance\ModelElementInstanceInterface;

interface InteractionNodeInterface extends ModelElementInstanceInterface
{
    public function getId(): ?string;

    public function setId(string $id): void;
}
