<?php

include_once "../bootstrap.php";

use Dudulu\DesignPatterns\SingletonMode\SingletonDB;

/**
 * Class SingletonDBTest
 */
class SingletonDBTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return void
     */
    public function testConnection()
    {
        $db = SingletonDB::getInstance();

        $this->assertEquals(true, $db->connection());
    }
}
