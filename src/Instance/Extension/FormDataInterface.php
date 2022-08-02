<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface FormDataInterface extends BpmnModelElementInstanceInterface
{
    public function getFormFields(): array;
}
