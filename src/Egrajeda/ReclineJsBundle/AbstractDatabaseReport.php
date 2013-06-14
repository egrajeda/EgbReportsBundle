<?php

namespace Egrajeda\ReclineJsBundle;

abstract class AbstractDatabaseReport implements ReportInterface
{
    private $em;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getCsv()
    {
        $statement   = $this->getStatement($this->em);
        $transformer = new StatementToCsvTransformer();

        return $transformer->transform($statement);
    }

    /**
     * @param \Doctrine\ORM\EntityManager $em
     *
     * @return \Doctrine\DBAL\Driver\Statement
     */
    abstract public function getStatement(\Doctrine\ORM\EntityManager $em);
}
