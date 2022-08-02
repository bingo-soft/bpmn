<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\BpmnModelElementInstanceInterface;

interface ConnectorInterface extends BpmnModelElementInstanceInterface
{
    public function getConnectorId(): ConnectorIdInterface;

    public function setConnectorId(ConnectorIdInterface $connectorId): void;

    public function getInputOutput(): InputOutputInterface;

    public function setInputOutput(InputOutputInterface $inputOutput): void;
}
