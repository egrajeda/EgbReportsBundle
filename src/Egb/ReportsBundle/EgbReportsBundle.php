<?php

namespace Egb\ReportsBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Egb\ReportsBundle\DependencyInjection\Compiler\CompilerPass;

class EgbReportsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CompilerPass());
    }
}
