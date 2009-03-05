<?php
require_once 'PHPUnit/Framework.php';
require_once("./PHPDate.php");

class PHPDateTest extends PHPUnit_Framework_TestCase
{
    function testGetWeek()
    {
        $phpDate = new PHPDate();
        $dart = array("2009-02-22",
            "2009-02-23",
            "2009-02-24",
            "2009-02-25",
            "2009-02-26",
            "2009-02-27",
            "2009-02-28");
        $this->assertEquals($dart, $phpDate->getWeek());
    }
}

?>
