<?php

namespace Bpmn\Impl\Instance\Extension;

use Xml\ModelBuilder;
use Xml\Instance\ModelElementInstanceInterface;
use Xml\Impl\Instance\ModelTypeInstanceContext;
use Xml\Type\ModelTypeInstanceProviderInterface;
use Bpmn\Impl\BpmnModelConstants;
use Bpmn\Impl\Instance\BpmnModelElementInstanceImpl;
use Bpmn\Instance\Extension\{
    FormDataInterface,
    FormFieldInterface
};

class FormDataImpl extends BpmnModelElementInstanceImpl implements FormDataInterface
{
    protected static $formFieldCollection;

    public static function registerType(ModelBuilder $modelBuilder): void
    {
        $typeBuilder = $modelBuilder->defineType(
            FormDataInterface::class,
            BpmnModelConstants::EXTENSION_ELEMENT_FORM_DATA
        )
        ->namespaceUri(BpmnModelConstants::EXTENSION_NS)
        ->instanceProvider(
            new class implements ModelTypeInstanceProviderInterface
            {
                public function newInstance(ModelTypeInstanceContext $instanceContext): ModelElementInstanceInterface
                {
                    return new FormDataImpl($instanceContext);
                }
            }
        );

        $sequenceBuilder = $typeBuilder->sequence();

        self::$formFieldCollection = $sequenceBuilder->elementCollection(FormFieldInterface::class)
        ->build();

        $typeBuilder->build();
    }

    public function getFormFields(): array
    {
        return self::$formFieldCollection->get($this);
    }
}
