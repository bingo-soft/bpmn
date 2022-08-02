<?php

namespace Bpmn\Instance;

use Bpmn\Impl\Instance\MessagePath;

interface CorrelationPropertyRetrievalExpressionInterface extends BaseElementInterface
{
    public function getMessage(): MessageInterface;

    public function setMessage(MessageInterface $message): void;

    public function getMessagePath(): MessagePath;

    public function setMessagePath(MessagePath $messagePath): void;
}
