<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Impl\Util\ModelUtil;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\GenericValueElementInterface;
use Bpmn\Instance\BpmnModelElementInstanceInterface;

class GenericValueElementImpl extends BpmnModelElementInstanceImpl implements GenericValueElementInterface
{
    public function getValue(): ?BpmnModelElementInstanceInterface
    {
        $childElements = $this->getDomElement()->getChildElements();
        if (empty($childElements)) {
            return null;
        } else {
            return ModelUtil::getModelElement($childElements[0], $this->modelInstance);
        }
    }

    public function removeValue(): void
    {
        $domElement = $this->getDomElement();
        $childElements = $domElement->getChildElements();
        foreach ($childElements as $childElement) {
            $domElement->removeChild($childElement);
        }
    }

    public function setValue(BpmnModelElementInstanceInterface $value): void
    {
        $this->removeValue();
        $this->getDomElement()->appendChild($value->getDomElement());
    }
}
