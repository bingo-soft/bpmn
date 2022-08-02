<?php

namespace Bpmn\Instance;

interface TextAnnotationInterface extends ArtifactInterface
{
    public function getTextFormat(): string;

    public function setTextFormat(string $textFormat): void;

    public function getText(): TextInterface;

    public function setText(TextInterface $text): void;
}
