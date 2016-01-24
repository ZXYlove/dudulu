<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/24
 * Time: 下午5:27
 * File: SingletonDB.php
 */

namespace Dudulu\DesignPatterns\SingletonMode;


use Dudulu\DesignPatterns\DB\Interfaces\DriveInterface;

/**
 * Class SingletonDB
 * @package Dudulu\DesignPatterns\SingletonMode
 */
class SingletonDB implements DriveInterface
{

    /**
     * @var SingletonDB
     */
    protected static $db;

    /**
     * SingletonDB constructor.
     */
    private function __construct()
    {

    }

    /**
     * @return SingletonDB
     */
    public static function getInstance()
    {
        if (self::$db) {
            return self::$db;
        }
        self::$db = new self();
        return self::$db;
    }

    /**
     * @return bool
     */
    public function connection()
    {
        return true;
    }
}