<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    CallConversationInterface,
    GlobalConversationInterface,
    ConversationNodeInterface,
    ParticipantAssociationInterface
};

class CallConversationImpl extends ConversationNodeImpl implements CallConversationInterface
{
    protected static $calledCollaborationRefAttribute;
    protected static $participantAssociationCollection;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            CallConversationInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_CALL_CONVERSATION
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(ConversationNodeInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new CallConversationImpl($instanceContext);
                }
            }
        );

        self::$calledCollaborationRefAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::BPMN_ATTRIBUTE_CALLED_COLLABORATION_REF
        )
        ->qNameAttributeReference(GlobalConversationInterface::class)
        ->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$participantAssociationCollection = $sequenceBuilder->elementCollection(
            ParticipantAssociationInterface::class
        )
        ->build();

        $typeBuilder->build();
    }

    public function getCalledCollaboration(): GlobalConversationInterface
    {
        return self::$calledCollaborationRefAttribute->getReferenceTargetElement($this);
    }

    public function setCalledCollaboration(GlobalConversationInterface $calledCollaboration): void
    {
        self::$calledCollaborationRefAttribute->setReferenceTargetElement($this, $calledCollaboration);
    }

    public function getParticipantAssociations(): array
    {
        return self::$participantAssociationCollection->get($this);
    }
}
