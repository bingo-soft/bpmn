<?php

namespace Bpmn\Instance;

use Bpmn\Builder\AbstractBaseElementBuilder;
use Xml\Instance\ModelElementInstanceInterface;

interface BpmnModelElementInstanceInterface extends ModelElementInstanceInterface
{
    public function builder(): AbstractBaseElementBuilder;

    public function isScope(): bool;

    public function getScope(): ?BpmnModelElementInstanceInterface;
}
