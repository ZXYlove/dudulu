<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/24
 * Time: 下午2:38
 * File: MysqlDrive.php
 */

namespace Dudulu\DesignPatterns\DB;
use Dudulu\DesignPatterns\DB\Interfaces\DriveInterface;


/**
 * Class MysqlDrive
 * @package Dudulu\DesignPatterns\FactoryMode\DB
 */
class MysqlDrive implements DriveInterface
{

    /**
     * @return bool
     */
    public function connection()
    {
        return true;
    }
}