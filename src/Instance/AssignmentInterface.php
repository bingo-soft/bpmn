<?php

namespace Bpmn\Instance;

use Bpmn\Impl\Instance\{
    From,
    To
};

interface AssignmentInterface extends BaseElementInterface
{
    public function getFrom(): From;

    public function setFrom(From $from): void;

    public function getTo(): To;

    public function setTo(To $to): void;
}
