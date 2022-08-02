<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\ScriptInterface;

class ScriptImpl extends BpmnModelElementInstanceImpl implements ScriptInterface
{
    protected static $scriptFormatAttribute;
    protected static $resourceAttribute;

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            ScriptInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_SCRIPT
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new ScriptImpl($instanceContext);
                }
            }
        );

        self::$scriptFormatAttribute = $typeBuilder->stringAttribute(
            BpmnModelConstants::EXTENSION_ATTRIBUTE_SCRIPT_FORMAT
        )
        ->required()
        ->build();

        self::$resourceAttribute = $typeBuilder->stringAttribute(BpmnModelConstants::EXTENSION_ATTRIBUTE_RESOURCE)
        ->build();

        $typeBuilder->build();
    }

    public function getScriptFormat(): string
    {
        return self::$scriptFormatAttribute->getValue($this);
    }

    public function setScriptFormat(string $scriptFormat): void
    {
        self::$scriptFormatAttribute->setValue($this, $scriptFormat);
    }

    public function getResource(): ?string
    {
        return self::$resourceAttribute->getValue($this);
    }

    public function setResource(string $resource): void
    {
        self::$resourceAttribute->setValue($this, $resource);
    }
}
