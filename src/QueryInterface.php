<?php

namespace Bpmn;

use Xml\Instance\ModelElementInstanceInterface;

interface QueryInterface
{
    public function list(): array;

    public function count(): int;

    /**
     * @param mixed $type
     */
    public function filterByType($type): QueryInterface;

    public function singleResult(): ModelElementInstanceInterface;
}
