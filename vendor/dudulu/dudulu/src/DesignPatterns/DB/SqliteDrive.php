<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/24
 * Time: 下午2:39
 * File: SqliteDrive.php
 */

namespace Dudulu\DesignPatterns\DB;


use Dudulu\DesignPatterns\DB\Interfaces\DriveInterface;

/**
 * Class SqliteDrive
 * @package Dudulu\DesignPatterns\DB
 */
class SqliteDrive implements DriveInterface
{
    /**
     * @return bool
     */
    public function connection()
    {
        return true;
    }
}