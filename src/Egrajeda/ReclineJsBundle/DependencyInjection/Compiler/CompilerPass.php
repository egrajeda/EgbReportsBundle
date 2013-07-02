<?php

namespace Egrajeda\ReclineJsBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class CompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $this->processReports($container);
        $this->processReportBuilders($container);
    }

    private function processReports(ContainerBuilder $container)
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

    private function processReportBuilders(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('egrajeda_reclinejs.report_builder_loader')) {
            return;
        }

        $definition = $container->getDefinition(
            'egrajeda_reclinejs.report_builder_loader'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'egrajeda_reclinejs.report_builder'
        );
        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'register', array(new Reference($id))
            );
        }
    }
}
