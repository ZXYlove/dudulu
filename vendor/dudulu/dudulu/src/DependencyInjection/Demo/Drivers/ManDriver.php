<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/23
 * Time: 下午5:37
 * File: ManDriver.php
 */

namespace Dudulu\DependencyInjection\Demo\Drivers;


use Dudulu\DependencyInjection\Demo\Interfaces\DriverInterface;

/**
 * Class ManDriver
 * @package Dudulu\DependencyInjection\Demo\Drivers
 */
class ManDriver implements DriverInterface
{
    /**
     * @return void
     */
    public function drive()
    {
        echo "开始开车...";
    }
}