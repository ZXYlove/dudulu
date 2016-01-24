<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/23
 * Time: 下午5:27
 * File: Car.php
 */

namespace Dudulu\DependencyInjection\Demo;


use Dudulu\DependencyInjection\Demo\DI\Container;
use Dudulu\DependencyInjection\Demo\Drivers\ManDriver;

/**
 * Class Car
 * @package Dudulu\DependencyInjection\Demo
 */
class Car
{

    /**
     * @var ManDriver
     */
    private $driver;

    /**
     * Car constructor.
     * @param ManDriver $driver
     */
    public function __construct(ManDriver $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->driver->drive();
    }

}
