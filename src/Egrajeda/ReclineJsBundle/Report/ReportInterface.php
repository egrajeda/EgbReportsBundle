<?php

namespace Egrajeda\ReclineJsBundle\Report;

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
