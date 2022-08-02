<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Bpmn\Impl\BpmnModelConstants;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Bpmn\Instance\{
    BaseElementInterface,
    DocumentationInterface,
    ExtensionElementsInterface
};
use Bpmn\Instance\Di\DiagramElementInterface;

abstract class BaseElementImpl extends BpmnModelElementInstanceImpl implements BaseElementInterface
{
    protected static $idAttribute;
    protected static $documentationCollection;
    protected static $extensionElementsChild;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $bpmnModelBuilder): void
    {
        $typeBuilder = $bpmnModelBuilder->defineType(
            BaseElementInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_BASE_ELEMENT
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->abstractType();

        self::$idAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_ID)
                             ->idAttribute()
                             ->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$documentationCollection = $sequenceBuilder->elementCollection(DocumentationInterface::class)
                                         ->build();

        self::$extensionElementsChild = $sequenceBuilder->element(ExtensionElementsInterface::class)
                                        ->build();

        $typeBuilder->build();
    }

    public function getId(): ?string
    {
        return self::$idAttribute->getValue($this);
    }

    public function setId(string $id): void
    {
        self::$idAttribute->setValue($this, $id);
    }

    public function getDocumentations(): array
    {
        return self::$documentationCollection->get($this);
    }

    public function getExtensionElements(): ExtensionElementsInterface
    {
        return self::$extensionElementsChild->getChild($this);
    }

    public function setExtensionElements(ExtensionElementsInterface $extensionElements): void
    {
        self::$extensionElementsChild->setChild($this, $extensionElements);
    }

    public function getDiagramElement(): ?DiagramElementInterface
    {
        $incomingReferences = $this->getIncomingReferencesByType(DiagramElementInterface::class);
        foreach ($incomingReferences as $reference) {
            foreach ($reference->findReferenceSourceElements($this) as $sourceElement) {
                $referenceIdentifier = $reference->getReferenceIdentifier($sourceElement);
                if ($referenceIdentifier !== null && $referenceIdentifier == $this->getId()) {
                    return $sourceElement;
                }
            }
        }
        return null;
    }

    public function getIncomingReferencesByType(string $referenceSourceTypeClass): array
    {
        $references = [];
        foreach (self::$idAttribute->getIncomingReferences() as $reference) {
            $sourceElementType = $reference->getReferenceSourceElementType();
            $sourceInstanceType = $sourceElementType->getInstanceType();
            if (is_a($sourceInstanceType, $referenceSourceTypeClass, true)) {
                $references[] = $reference;
            }
        }
        return $references;
    }
}
