<?php

namespace Bpmn\Instance;

interface IoSpecificationInterface extends BaseElementInterface
{
    public function getDataInputs(): array;

    public function getDataOutputs(): array;

    public function getInputSets(): array;

    public function getOutputSets(): array;
}
