<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/23
 * Time: 下午5:05
 * File: FileNotFoundException.php
 */

namespace Dudulu\HttpFoundation\File\Exception;

/**
 * Class FileNotFoundException
 * @package Dudulu\HttpFoundation\File\Exception
 */
class FileNotFoundException extends FileException
{
    /**
     * Constructor.
     *
     * @param string $path The path to the file that was not found
     */
    public function __construct($path)
    {
        parent::__construct(sprintf('The file "%s" does not exist', $path));
    }
}