<?php

/**
 * Copyright 2013 Eduardo Grajeda Blandón <tatofoo@gmail.com>
 */

namespace Egb\ReportsBundle\Report;

use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Holds the instances of all the created reports.
 */
class ReportContainer
{
    private $doctrine;

    private $reports = array();

    /**
     * @param RegistryInterface $doctrine
     *
     * @returns ReportContainer
     */
    public function setDoctrine(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;

        return $this;
    }

    /**
     * @param ReportInterface $report
     *
     * @returns ReportContainer
     */
    public function add(ReportInterface $report)
    {
        if ($report instanceof DoctrineAwareInterface) {
            $report->setDoctrine($this->doctrine);
        }

        $this->reports[] = $report;

        return $this;
    }

    /**
     * @returns array
     */
    public function all()
    {
        return $this->reports;
    }
}
