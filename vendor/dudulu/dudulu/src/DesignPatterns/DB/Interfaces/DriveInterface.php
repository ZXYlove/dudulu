<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/24
 * Time: 下午5:03
 * File: DriveInterface.php
 */

namespace Dudulu\DesignPatterns\DB\Interfaces;


/**
 * Interface DriveInterface
 * @package Dudulu\DesignPatterns\DB\Interfaces
 */
interface DriveInterface
{
    /**
     * @return mixed
     */
    public function connection();
}