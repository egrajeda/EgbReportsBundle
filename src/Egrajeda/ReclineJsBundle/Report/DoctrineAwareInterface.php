<?php

/**
 * Copyright 2013 Eduardo Grajeda Blandón <tatofoo@gmail.com>
 */

namespace Egrajeda\ReclineJsBundle\Report;

use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * DoctrineAwareInterface should be implemented by report classes that depends
 * on Doctrine.
 */
interface DoctrineAwareInterface
{
    /**
     * Sets the Doctrine Registry service.
     *
     * @param RegistryInterface|null $doctrine
     */
    public function setDoctrine(RegistryInterface $doctrine = null);
}
