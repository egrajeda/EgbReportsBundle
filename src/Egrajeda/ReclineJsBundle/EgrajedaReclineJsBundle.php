<?php

namespace Egrajeda\ReclineJsBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Egrajeda\ReclineJsBundle\DependencyInjection\Compiler\CompilerPass;

class EgrajedaReclineJsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CompilerPass());
    }
}
