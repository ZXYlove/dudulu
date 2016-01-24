<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/23
 * Time: 下午4:23
 * File: Request.php
 */

namespace Dudulu\HttpFoundation;

/**
 * Class Request
 * @package Dudulu\HttpFoundation
 */
class Request
{

    /**
     * @var ParameterBag
     */
    protected $query;

    /**
     * @var ParameterBag
     */
    protected $request;

    /**
     * @var ParameterBag
     */
    protected $attributes;

    /**
     * @var ParameterBag
     */
    protected $cookies;

    /**
     * @var FileBag
     */
    protected $files;

    /**
     * @var ServerBag
     */
    protected $server;

    /**
     * @var HeaderBag
     */
    protected $headers;

    /**
     * @var string
     */
    protected $content = '';

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $basePath;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $pathInfo;

    /**
     * Request constructor.
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     */
    public function __construct( array $query = [], array $request = [], array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null)
    {
        $this->initialize($query, $request, $attributes, $cookies, $files, $server, $content);
    }

    /**
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     * @return void
     */
    public function initialize(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null)
    {
        $this->request = new ParameterBag($request);
        $this->query = new ParameterBag($query);
        $this->attributes = new ParameterBag($attributes);
        $this->cookies = new ParameterBag($cookies);
        $this->files = new FileBag($files);
        $this->server = new ServerBag($server);
        $this->headers = new HeaderBag($this->server->getHeaders());

        $this->content = $content;
//        $this->languages = null;
//        $this->charsets = null;
//        $this->encodings = null;
//        $this->acceptableContentTypes = null;
        $this->pathInfo = null;
//        $this->requestUri = null;
        $this->baseUrl = null;
        $this->basePath = null;
        $this->method = null;
//        $this->format = null;
    }

    /**
     * Gets a "parameter" value.
     *
     * @param $key
     * @param null $default
     * @param bool $deep
     * @return null
     */
    public function get($key, $default = null, $deep = false )
    {
        if ($this !== $result = $this->query->get($key, $this, $deep)) {
            return $result;
        }

        if ($this !== $result = $this->attributes->get($key, $this, $deep)) {
            return $result;
        }

        if ($this !== $result = $this->request->get($key, $this, $deep)) {
            return $result;
        }

        return $default;
    }
}