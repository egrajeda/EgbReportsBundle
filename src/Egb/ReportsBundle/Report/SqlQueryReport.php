<?php

/**
 * Copyright 2013 Eduardo Grajeda Blandón <tatofoo@gmail.com>
 */

namespace Egb\ReportsBundle\Report;

use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Basic report that shows the results of a SQL query.
 */
class SqlQueryReport implements ReportInterface, DoctrineAwareInterface
{
    private $name;

    private $description;

    private $slug;

    private $query;

    private $doctrine;

    /**
     * @param string $name
     * @param string $query
     * @param array $options
     */
    public function __construct($name, $query, array $options = array())
    {
        $this->name  = $name;
        $this->query = $query;
        $this->slug  = isset($options['slug']) ? $options['slug'] : $this->slugify($name);
        $this->description = @$options['description'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getData()
    {
        $statement = $this->doctrine
            ->getManager()
            ->getConnection()
            ->prepare($this->query);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function setDoctrine(RegistryInterface $doctrine = null)
    {
        $this->doctrine = $doctrine;
    }

    private function slugify($text)
    {
        $slug = preg_replace('/\W+/', '-', $text);
        $slug = strtolower(trim($slug, '-'));

        return $slug;
    }
}
