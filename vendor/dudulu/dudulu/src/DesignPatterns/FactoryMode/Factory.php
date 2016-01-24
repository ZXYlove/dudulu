<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/24
 * Time: 下午2:37
 * File: Factory.php
 */

namespace Dudulu\DesignPatterns\FactoryMode;


use Dudulu\DesignPatterns\DB\DemoDB;
use Dudulu\DesignPatterns\DB\MysqlDrive;
use Dudulu\DesignPatterns\RegisterMode\Register;

/**
 * Class Factory
 * @package Dudulu\DesignPatterns\FactoryMode
 */
class Factory
{

    /**
     * @return MysqlDrive
     */
    public static function database()
    {
        return new MysqlDrive();
    }

    /**
     * @return DemoDB
     */
    public static function testDb()
    {
        $db = DemoDB::getInstance();

        Register::set('DemoDB', $db);

        return $db;
    }
}