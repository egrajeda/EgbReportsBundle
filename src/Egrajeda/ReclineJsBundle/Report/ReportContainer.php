<?php

namespace Egrajeda\ReclineJsBundle\Report;

class ReportContainer
{
    private $em;

    private $reports = array();

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function add($report)
    {
        if ($report instanceof AbstractDatabaseReport) {
            $report->setManager($this->em);
        }

        $this->reports[] = $report;
    }

    public function all()
    {
        return $this->reports;
    }
}
