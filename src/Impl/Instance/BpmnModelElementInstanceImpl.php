<?php

namespace Bpmn\Impl\Instance;

use Xml\Impl\Instance\{
    ModelElementInstanceImpl,
    ModelTypeInstanceContext
};
use Bpmn\Builder\AbstractBaseElementBuilder;
use Bpmn\Exception\BpmnModelException;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    BpmnModelElementInstanceInterface,
    ProcessInterface,
    SubProcessInterface
};

abstract class BpmnModelElementInstanceImpl extends ModelElementInstanceImpl implements BpmnModelElementInstanceInterface
{
    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public function builder(): AbstractBaseElementBuilder
    {
        throw new BpmnModelException("No builder implemented");
    }

    public function isScope(): bool
    {
        return $this instanceof ProcessInterface || $this instanceof SubProcessInterface;
    }

    public function getScope(): ?BpmnModelElementInstanceInterface
    {
        $parentElement = $this->getParentElement();
        if ($parentElement !== null) {
            if ($parentElement->isScope()) {
                return $parentElement;
            } else {
                return $parentElement->getScope();
            }
        } else {
            return null;
        }
    }
}
