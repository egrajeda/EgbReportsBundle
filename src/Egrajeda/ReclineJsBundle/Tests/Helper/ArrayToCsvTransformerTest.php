<?php

namespace Egrajeda\ReclineJsBundle\Tests;

use Egrajeda\ReclineJsBundle\Helper\ArrayToCsvTransformer;

class ArrayToCsvTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransform()
    {
        $data = array(
            array("a" => "Hello", "b" => "World"),
            array("a" => "Goodbye", "b" => "World"),
        );

        $transformer = new ArrayToCsvTransformer();
        $csv = $transformer->transform($data);

        $this->assertEquals("a,b\nHello,World\nGoodbye,World\n", $csv);
    }
}
