<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/23
 * Time: 下午5:35
 * File: DriverInterface.php
 */

namespace Dudulu\DependencyInjection\Demo\Interfaces;


interface DriverInterface
{
    /**
     * @return mixed
     */
    public function drive();
}