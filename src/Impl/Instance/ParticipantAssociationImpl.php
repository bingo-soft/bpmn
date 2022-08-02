<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    BaseElementInterface,
    ParticipantAssociationInterface,
    ParticipantInterface
};

class ParticipantAssociationImpl extends BaseElementImpl implements ParticipantAssociationInterface
{
    protected static $innerParticipantRefChild;
    protected static $outerParticipantRefChild;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            ParticipantAssociationInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_PARTICIPANT_ASSOCIATION
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(BaseElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new ParticipantAssociationImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$innerParticipantRefChild = $sequenceBuilder->element(InnerParticipantRef::class)
        ->required()
        ->qNameElementReference(ParticipantInterface::class)
        ->build();

        self::$outerParticipantRefChild = $sequenceBuilder->element(OuterParticipantRef::class)
        ->required()
        ->qNameElementReference(ParticipantInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getInnerParticipant(): ParticipantInterface
    {
        return self::$innerParticipantRefChild->getReferenceTargetElement($this);
    }

    public function setInnerParticipant(ParticipantInterface $innerParticipant): void
    {
        self::$innerParticipantRefChild->setReferenceTargetElement($this, $innerParticipant);
    }

    public function getOuterParticipant(): ParticipantInterface
    {
        return self::$outerParticipantRefChild->getReferenceTargetElement($this);
    }

    public function setOuterParticipant(ParticipantInterface $outerParticipant): void
    {
        self::$outerParticipantRefChild->setReferenceTargetElement($this, $outerParticipant);
    }
}
