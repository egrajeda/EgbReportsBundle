<?php

namespace Egb\ReportsBundle\DependencyInjection\Compiler;

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
        if (!$container->hasDefinition('egb_reports.report_container')) {
            return;
        }

        $definition = $container->getDefinition(
            'egb_reports.report_container'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'egb_reports.report'
        );
        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'add', array(new Reference($id))
            );
        }
    }

    private function processReportBuilders(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('egb_reports.report_builder_loader')) {
            return;
        }

        $definition = $container->getDefinition(
            'egb_reports.report_builder_loader'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'egb_reports.report_builder'
        );
        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'register', array(new Reference($id))
            );
        }
    }
}
