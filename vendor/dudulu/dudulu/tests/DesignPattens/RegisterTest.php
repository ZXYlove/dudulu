<?php

include_once "../bootstrap.php";

use Dudulu\DesignPatterns\RegisterMode\Register;
use Dudulu\DesignPatterns\DB\DemoDB;

/**
 * Class RegisterTest
 */
class RegisterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return void
     */
    public function testConnection()
    {
        Register::set('DB', DemoDB::getInstance());

        $db = Register::get('DB');

        $this->assertEquals(true, $db->connection());
    }
}
