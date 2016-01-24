<?php

include_once "../bootstrap.php";

use Dudulu\DesignPatterns\FactoryMode\Factory;

class FactoryTest extends PHPUnit_Framework_TestCase {

    public function testConnection()
    {
        $db = Factory::database();

        $this->assertEquals(true, $db->connection());
    }
}
