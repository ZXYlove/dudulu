<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/24
 * Time: 下午6:30
 * File: DemoDB.php
 */

namespace Dudulu\DesignPatterns\DB;


use Dudulu\DesignPatterns\DB\Interfaces\DriveInterface;

class DemoDB implements DriveInterface
{
    /**
     * @var DemoDB
     */
    protected static $db;

    /**
     * SingletonDB constructor.
     */
    private function __construct()
    {

    }

    /**
     * @return DemoDB
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