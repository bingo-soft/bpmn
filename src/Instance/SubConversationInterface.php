<?php

namespace Bpmn\Instance;

interface SubConversationInterface extends ConversationNodeInterface
{
    public function getConversationNodes(): array;
}
