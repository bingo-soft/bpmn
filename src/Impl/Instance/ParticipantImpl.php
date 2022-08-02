<?php

namespace Bpmn\Impl\Instance;

use Xml\ModelBuilder;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    BaseElementInterface,
    EndPointInterface,
    InterfaceInterface,
    ParticipantInterface,
    ParticipantMultiplicityInterface,
    ProcessInterface
};

class ParticipantImpl extends BaseElementImpl implements ParticipantInterface
{
    protected static $nameAttribute;
    protected static $processRefAttribute;
    protected static $interfaceRefCollection;
    protected static $endPointRefCollection;
    protected static $participantMultiplicityChild;

    public function __construct(ModelTypeInstanceContext $instanceContext)
    {
        parent::__construct($instanceContext);
    }

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            ParticipantInterface::class,
            BpmnModelConstants::BPMN_ELEMENT_PARTICIPANT
        )
        ->namespaceUri(BpmnModelConstants::BPMN20_NS)
        ->extendsType(BaseElementInterface::class)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new ParticipantImpl($instanceContext);
                }
            }
        );

        self::$nameAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_NAME)
        ->build();

        self::$processRefAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::BPMN_ATTRIBUTE_PROCESS_REF)
        ->qNameAttributeReference(ProcessInterface::class)
        ->build();

        $sequenceBuilder = $typeBuilder->sequence();

        self::$interfaceRefCollection = $sequenceBuilder->elementCollection(InterfaceRef::class)
        ->qNameElementReferenceCollection(InterfaceInterface::class)
        ->build();

        self::$endPointRefCollection = $sequenceBuilder->elementCollection(EndPointRef::class)
        ->qNameElementReferenceCollection(EndPointInterface::class)
        ->build();

        self::$participantMultiplicityChild = $sequenceBuilder->element(ParticipantMultiplicityInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getName(): string
    {
        return self::$nameAttribute->getValue($this);
    }

    public function setName(string $name): void
    {
        self::$nameAttribute->setValue($this, $name);
    }

    public function getProcess(): ProcessInterface
    {
        return self::$processRefAttribute->getReferenceTargetElement($this);
    }

    public function setProcess(ProcessInterface $process): void
    {
        self::$processRefAttribute->setReferenceTargetElement($this, $process);
    }

    public function getInterfaces(): array
    {
        return self::$interfaceRefCollection->getReferenceTargetElements($this);
    }

    public function getEndPoints(): array
    {
        return self::$endPointRefCollection->getReferenceTargetElements($this);
    }

    public function getParticipantMultiplicity(): ParticipantMultiplicityInterface
    {
        return self::$participantMultiplicityChild->getChild($this);
    }

    public function setParticipantMultiplicity(ParticipantMultiplicityInterface $participantMultiplicity): void
    {
        self::$participantMultiplicityChild->setChild($this, $participantMultiplicity);
    }
}
