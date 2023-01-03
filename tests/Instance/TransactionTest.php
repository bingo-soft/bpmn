<?php

namespace Tests\Instance;

use Xml\Test\{
    AbstractTypeAssumption,
    AttributeAssumption
};
use Xml\Impl\Instance\DomDocumentExt;
use Bpmn\Bpmn;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Instance\{
    SubProcessInterface,
    TransactionInterface
};

class TransactionTest extends BpmnModelElementInstanceTest
{
    public function getTypeAssumption(): AbstractTypeAssumption
    {
        return new BpmnTypeAssumption($this->model, false, null, SubProcessInterface::class);
    }

    public function getChildElementAssumptions(): array
    {
        return [];
    }

    public function getAttributesAssumptions(): array
    {
        return [
            new AttributeAssumption(null, "method", false, false, "Compensate")
        ];
    }

    public function shouldReadTransaction(): void
    {
        $ref = new \ReflectionClass(static::class);
        $className = str_replace('Test', 'Interface', $ref->getShortName());
        $instanceClass = sprintf("%s\%s", str_replace('Tests', 'Bpmn', __NAMESPACE__), $className);
        $modelInstance = Bpmn::readModelFromStream(
            fopen(realpath(".") . "/tests/Resources/TransactionTest.xml", "r+")
        );
        $transaction = $modelInstance->getModelElementById("transaction");

        $this->assertFalse($transaction === null);
        $this->assertEquals("Image", $transaction->getMethod());
        $this->assertCount(1, $transaction->getFlowElements());
    }

    public function testShouldWriteTransaction(): void
    {
        // given a model
        $newModel = Bpmn::createProcess("process")->done();

        $process = $newModel->getModelElementById("process");

        $transaction = $newModel->newInstance(TransactionInterface::class);
        $transaction->setId("transaction");
        $transaction->setMethod("##Store");
        $process->addChildElement($transaction);

        $doc = $newModel->getDocument()->getDomSource();
        $newDoc = new DomDocumentExt();
        $newDoc->loadXML($doc->saveXML());
        $transactionElements = $newDoc->getElementsByTagName("transaction");
        $this->assertCount(1, $transactionElements);
        $transactionElement = $transactionElements[0];
        $this->assertFalse($transactionElement === null);

        $methodAttribute = $transactionElement->attributes->getNamedItem("method");
        $this->assertEquals("##Store", $methodAttribute->nodeValue);
    }
}
