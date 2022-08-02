<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Xml\Impl\Util\ModelUtil;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\BpmnModelElementInstanceInterface;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\{
    ListInterface,
    ValueInterface
};

class ListImpl extends BpmnModelElementInstanceImpl implements ListInterface
{
    protected static $valueChild;

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            ListInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_LIST
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new ListImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$valueChild = $sequenceBuilder->element(ValueInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getValue(): ?ValueInterface
    {
        return self::$valueAttribute->getValue($this);
    }

    public function setValue(ValueInterface $value): void
    {
        self::$valueAttribute->setValue($this, $value);
    }

    public function getValues(): array
    {
        return $this->getElements();
    }

    public function addValue(ValueInterface $value): void
    {
        self::$valueChild->add($this, $value);
    }

    public function removeValue(ValueInterface $value): void
    {
        self::$valueChild->remove($this, $value);
    }

    public function clearValues(): void
    {
        self::$valueChild->clear($this);
    }

    public function getElements(): array
    {
        return ModelUtil::getModelElementCollection(
            $this->getDomElement()->getChildElements(),
            $this->getModelInstance()
        );
    }

    public function size(): int
    {
        return count($this->getElement());
    }

    public function isEmpty(): bool
    {
        return $this->size() == 0;
    }

    public function contains(ModelElementInstanceInterface $el): bool
    {
        foreach ($this->getElements() as $elementToCheck) {
            if ($elementToCheck->equals($el)) {
                return true;
            }
        }
        return false;
    }

    public function add(ModelElementInstanceInterface $el): bool
    {
        $this->getDomElement()->appendChild($el->getDomElement());
        return true;
    }

    public function remove(ModelElementInstanceInterface $el): bool
    {
        ModelUtil::ensureInstanceOf($el, BpmnModelElementInstanceInterface::class);
        return $this->getDomElement()->removeChild($el->getDomElement());
    }

    public function containsAll(array $c): bool
    {
        foreach ($c as $o) {
            if (!$this->contains($o)) {
                return false;
            }
        }
        return true;
    }

    public function addAll(array $c): bool
    {
        foreach ($c as $o) {
            $this->add($o);
        }
        return true;
    }

    public function removeAll(array $c): bool
    {
        $result = false;
        foreach ($c as $o) {
            $result |= $this->remove($o);
        }
        return $result;
    }

    public function clear(): void
    {
        $domElement = $this->getDomElement();
        $childElements = $domElement->getChildElements();
        foreach ($childElements as $childElement) {
            $domElement->removeChild($childElement);
        }
    }
}
