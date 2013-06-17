<?php

namespace Egrajeda\ReclineJsBundle;

use Egrajeda\ReclineJsBundle\Helper\ArrayToCsvTransformer;

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
        $data = $this->getData($this->em);
        $transformer = new ArrayToCsvTransformer();

        return $transformer->transform($data);
    }

    /**
     * @param \Doctrine\ORM\EntityManager $em
     *
     * @return array
     */
    abstract protected function getData(\Doctrine\ORM\EntityManager $em);
}
