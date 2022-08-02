<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    ArtifactInterface,
    CategoryValueInterface,
    GroupInterface
};
use Bpmn\Instance\Bpmndi\BpmnEdgeInterface;

class GroupImpl extends ArtifactImpl implements GroupInterface
{
    protected static $categoryValueRefAttribute;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            GroupInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_GROUP
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(ArtifactInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new GroupImpl($instanceContext);
                }
            }
        );

        self::$categoryValueRefAttribute =
        $typeBuilder
            ->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_CATEGORY_VALUE_REF)
            ->qNameAttributeReference(CategoryValueInterface::class)
            ->build();

        $typeBuilder->build();
    }

    public function getCategory(): CategoryValueInterface
    {
        return self::$categoryValueRefAttribute->getReferenceTargetElement($this);
    }

    public function setCategory(CategoryValueInterface $categoryValue): void
    {
        self::$categoryValueRefAttribute->setReferenceTargetElement($this, $categoryValue);
    }

    public function getDiagramElement(): BpmnEdgeInterface
    {
        return parent::getDiagramElement();
    }
}
