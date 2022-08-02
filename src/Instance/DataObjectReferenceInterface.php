<?php

namespace Bpmn\Instance;

interface DataObjectReferenceInterface extends FlowElementInterface, ItemAwareElementInterface
{
    public function getDataObject(): DataObjectInterface;

    public function setDataObject(DataObjectInterface $dataObject): void;
}
