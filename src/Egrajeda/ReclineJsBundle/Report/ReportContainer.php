<?php

namespace Egrajeda\ReclineJsBundle\Report;

class ReportContainer
{
    private $reports = array();

    public function add($report)
    {
        $this->reports[] = $report;
    }

    public function all()
    {
        return $this->reports;
    }
}
