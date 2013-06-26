<?php

namespace Egrajeda\ReclineJsBundle\Report;

abstract class AbstractDatabaseReport implements ReportInterface
{
    private $em;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     *
     * @return AbstractDatabaseReport
     */
    public function setManager(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;

        return $this;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getManager()
    {
        return $this->em;
    }

    public function getDescription()
    {
        return '';
    }

    abstract public function getName();

    abstract public function getSlug();

    abstract public function getData();
}
