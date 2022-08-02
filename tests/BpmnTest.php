<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Bpmn\Bpmn;

class BpmnTest extends TestCase
{
    public function testBpmn(): void
    {
        $this->assertFalse(Bpmn::getInstance() === null);
    }
}
