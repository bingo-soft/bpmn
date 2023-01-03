<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Xml\Impl\Util\ModelUtil;
use Bpmn\Bpmn;
use Bpmn\Instance\{
    BaseElementInterface,
    CatchEventInterface,
    DefinitionsInterface,
    StartEventInterface,
    MessageEventDefinitionInterface,
    EventInterface,
    ExtensionElementsInterface,
    EventDefinitionInterface
};

class ModelTest extends TestCase
{
    public function testCreateEmptyModel(): void
    {
        $bpmnModelInstance = Bpmn::createEmptyModel();

        $definitions = $bpmnModelInstance->getDefinitions();
        $this->assertNull($definitions);

        $definitions = $bpmnModelInstance->newInstance(DefinitionsInterface::class);
        $bpmnModelInstance->setDefinitions($definitions);

        $definitions = $bpmnModelInstance->getDefinitions();
        $this->assertFalse($definitions === null);
    }

    public function testBaseTypeCalculation(): void
    {
        $bpmnModelInstance = Bpmn::createEmptyModel();
        $model = $bpmnModelInstance->getModel();
        $allBaseTypes = ModelUtil::calculateAllBaseTypes($model->getType(StartEventInterface::class));
        $this->assertCount(5, $allBaseTypes);

        $allBaseTypes = ModelUtil::calculateAllBaseTypes($model->getType(MessageEventDefinitionInterface::class));
        $this->assertCount(3, $allBaseTypes);

        $allBaseTypes = ModelUtil::calculateAllBaseTypes($model->getType(BaseElementInterface::class));
        $this->assertCount(0, $allBaseTypes);
    }

    public function testExtendingTypeCalculation(): void
    {
        $bpmnModelInstance = Bpmn::createEmptyModel();
        $model = $bpmnModelInstance->getModel();
        $baseInstanceTypes = [];
        $baseInstanceTypes[] = $model->getType(EventInterface::class);
        $baseInstanceTypes[] = $model->getType(CatchEventInterface::class);
        $baseInstanceTypes[] = $model->getType(ExtensionElementsInterface::class);
        $baseInstanceTypes[] = $model->getType(EventDefinitionInterface::class);
        $allExtendingTypes = ModelUtil::calculateAllExtendingTypes($bpmnModelInstance->getModel(), $baseInstanceTypes);
        $this->assertCount(17, $allExtendingTypes);
    }
}
