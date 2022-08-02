<?php

namespace Bpmn\Instance\Di;

interface EdgeInterface extends DiagramElementInterface
{
    public function getWaypoints(): array;

    public function addWaypoint(WaypointInterface $point): void;
}
