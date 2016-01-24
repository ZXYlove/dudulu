<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/23
 * Time: 下午4:53
 * File: HeaderBag.php
 */

namespace Dudulu\HttpFoundation;


/**
 * Class HeaderBag
 * @package Dudulu\HttpFoundation
 */
class HeaderBag implements \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var array
     */
    protected $cacheControl = [];

    /**
     * HeaderBag constructor.
     * @param array $headers
     */
    public function __construct(array $headers = [])
    {
        foreach ($headers as $key => $values) {
            $this->set($key, $values);
        }
    }

    /**
     * Sets a header by name.
     *
     * @param string       $key     The key
     * @param string|array $values  The value or an array of values
     * @param bool         $replace Whether to replace the actual value or not (true by default)
     *
     * @api
     */
    public function set($key, $values, $replace = true)
    {
        $key = strtr(strtolower($key), '_', '-');

        $values = array_values((array) $values);

        if (true === $replace || !isset($this->headers[$key])) {
            $this->headers[$key] = $values;
        } else {
            $this->headers[$key] = array_merge($this->headers[$key], $values);
        }

        if ('cache-control' === $key) {
            $this->cacheControl = $this->parseCacheControl($values[0]);
        }
    }

    /**
     * Parses a Cache-Control HTTP header.
     *
     * @param string $header The value of the Cache-Control HTTP header
     *
     * @return array An array representing the attribute values
     */
    protected function parseCacheControl($header)
    {
        $cacheControl = array();
        preg_match_all('#([a-zA-Z][a-zA-Z_-]*)\s*(?:=(?:"([^"]*)"|([^ \t",;]*)))?#', $header, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $cacheControl[strtolower($match[1])] = isset($match[3]) ? $match[3] : (isset($match[2]) ? $match[2] : true);
        }

        return $cacheControl;
    }

    /**
     * @return \IteratorIterator
     */
    public function getIterator()
    {
        return new \IteratorIterator($this);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->headers);
    }
}