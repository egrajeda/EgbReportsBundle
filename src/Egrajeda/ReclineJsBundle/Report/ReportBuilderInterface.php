<?php

/**
 * Copyright 2013 Eduardo Grajeda Blandón <tatofoo@gmail.com>
 */

namespace Egrajeda\ReclineJsBundle\Report;

/**
 * An interface that should be implemented by those classes that are in charge
 * of creating the report classes.
 */
interface ReportBuilderInterface
{
    /**
     * @param ReportContainer $container
     */
    public function build(ReportContainer $container);
}
