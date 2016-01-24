<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/24
 * Time: 下午6:17
 * File: Register.php
 */

namespace Dudulu\DesignPatterns\RegisterMode;


/**
 * Class Register
 * @package Dudulu\DesignPatterns\RegisterMode
 */
class Register
{
    /**
     * @var array
     */
    protected static $classMaps = [];

    /**
     * @param $alias
     * @param $class
     * @return void
     */
    public static function set($alias, $class )
    {
        self::$classMaps[$alias] = $class;
    }

    /**
     * @param $alias
     * @return mixed
     */
    public static function get($alias )
    {
        return self::$classMaps[$alias];
    }
}