<?php

namespace Bpmn\Instance\Extension;

use Bpmn\Instance\{
    BpmnModelElementInstanceInterface,
    ResourceAssignmentExpressionInterface
};

interface PotentialStarterInterface extends BpmnModelElementInstanceInterface
{
    public function getResourceAssignmentExpression(): ResourceAssignmentExpressionInterface;

    public function setResourceAssignmentExpression(
        ResourceAssignmentExpressionInterface $resourceAssignmentExpression
    ): void;
}
