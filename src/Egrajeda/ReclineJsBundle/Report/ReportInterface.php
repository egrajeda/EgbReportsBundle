<?php

/**
 * Copyright 2013 Eduardo Grajeda Blandón <tatofoo@gmail.com>
 */

namespace Egrajeda\ReclineJsBundle\Report;

/**
 * Base interface that all report classes should implement.
 */
interface ReportInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @return array
     */
    public function getData();
}
