<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Bpmn\Bpmn;

class DataStoreTest extends TestCase
{
    public $modelInstance;

    protected function setUp(): void
    {
        $stream = fopen('tests/Resources/DataStoreTest.bpmn', 'r+');
        $this->modelInstance = Bpmn::readModelFromStream($stream);
    }

    public function testGetDataStore(): void
    {
        $dataStore = $this->modelInstance->getModelElementById("myDataStore");
        $this->assertFalse($dataStore === null);
        $this->assertEquals("My Data Store", $dataStore->getName());
        $this->assertEquals(23, $dataStore->getCapacity());
        $this->assertFalse($dataStore->isUnlimited());
    }

    public function testGetDataStoreReference(): void
    {
        $dataStoreReference = $this->modelInstance->getModelElementById("myDataStoreReference");
        $dataStore = $this->modelInstance->getModelElementById("myDataStore");
        $this->assertFalse($dataStoreReference === null);
        $this->assertEquals("My Data Store Reference", $dataStoreReference->getName());
        $this->assertTrue($dataStoreReference->getDataStore()->equals($dataStore));
    }
}
