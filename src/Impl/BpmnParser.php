<?php

namespace Bpmn\Impl;

use Bpmn\Bpmn;
use Xml\Impl\Parser\AbstractModelParser;
use Xml\Instance\DomDocumentInterface;
use Xml\ModelInstanceInterface;

class BpmnParser extends AbstractModelParser
{
    public function __construct()
    {
        $this->addSchema(BpmnModelConstants::BPMN20_NS, BpmnModelConstants::BPMN_20_SCHEMA_LOCATION);
    }

    protected function createModelInstance(DomDocumentInterface $document): ModelInstanceInterface
    {
        return new BpmnModelInstanceImpl(
            Bpmn::getInstance()->getBpmnModel(),
            Bpmn::getInstance()->getBpmnModelBuilder(),
            $document
        );
    }
}
