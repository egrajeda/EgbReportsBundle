<?php

namespace Egrajeda\ReclineJsBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class CompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('egrajeda_reclinejs.report_container')) {
            return;
        }

        $definition = $container->getDefinition(
            'egrajeda_reclinejs.report_container'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'egrajeda_reclinejs.report'
        );
        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'add', array(new Reference($id))
            );
        }
    }
}
