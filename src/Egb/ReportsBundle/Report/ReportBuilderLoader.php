<?php

/**
 * Copyright 2013 Eduardo Grajeda Blandón <tatofoo@gmail.com>
 */

namespace Egb\ReportsBundle\Report;

/**
 * Loads and calls all the registered report builders.
 */
class ReportBuilderLoader
{
    private $container;

    private $builders = array();

    /**
     * @param ReportContainer $container
     */
    public function __construct(ReportContainer $container)
    {
        $this->container = $container;
    }

    /**
     * @return ReportBuilderLoader
     */
    public function load()
    {
        foreach ($this->builders as $builder) {
            $builder->build($this->container);
        }

        return $this;
    }

    /**
     * @param ReportBuilderInterface $builder
     *
     * @return ReportBuilderLoader
     */
    public function register(ReportBuilderInterface $builder)
    {
        $this->builders[] = $builder;

        return $this;
    }
}
