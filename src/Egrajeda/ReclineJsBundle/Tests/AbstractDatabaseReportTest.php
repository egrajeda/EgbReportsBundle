<?php

namespace Egrajeda\ReclineJsBundle\Tests;

use Egrajeda\ReclineJsBundle\AbstractDatabaseReport;

class AbstractDatabaseReportTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCsv()
    {
        $entityManagerMock = $this->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();

        $stub = $this->getMockForAbstractClass('Egrajeda\ReclineJsBundle\AbstractDatabaseReport', array(
            $entityManagerMock
        ));
        $stub->expects($this->any())
            ->method('getData')
            ->will($this->returnValue(array(
                array('column_a' => 'Hello', 'column_b' => 'World'),
                array('column_a' => 'Goodbye', 'column_b' => 'World'),
            )));

        $this->assertEquals("column_a,column_b\nHello,World\nGoodbye,World\n", $stub->getCsv());
    }
}
