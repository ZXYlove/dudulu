<?php
/**
 * Created by PhpStorm.
 * User: LatteCake
 * Date: 16/1/23
 * Time: 下午6:00
 * File: Container.php
 */

namespace Dudulu\DependencyInjection\Demo\DI;


/**
 * Class Container
 * @package Dudulu\DependencyInjection\Demo\DI
 */
class Container
{
    /**
     * @var string
     */
    private $containerClass = '';

    /**
     * @var $this
     */
    private $container;

    /**
     * Container constructor.
     * @param string $containerClass
     */
    public function __construct($containerClass = 'Dudulu\DI')
    {
        $this->containerClass = $containerClass;
    }

    /**
     * @param $k
     * @param $c
     * @return void
     */
    public function __set($k, $c)
    {
        $this->container[$k] = $c;
    }

    /**
     * @param $k
     * @return Container
     */
    public function __get($k)
    {
        // return $this->s[$k]($this);
        return $this->build($this->container[$k]);
    }

    /**
     * @param $className
     * @return mixed
     * @throws \Exception
     */
    public function build($className)
    {
        if ($className instanceof \Closure) {
            return $className($this);
        }

        /** @var \ReflectionClass $reflector 反射类 */
        $reflector = new \ReflectionClass($className);

        // 检测是否可实例化
        if (!$reflector->isInstantiable()) {
            throw new \Exception("Can't instantiate this.");
        }

        /** @var \ReflectionMethod $constructor 获取类的构造函数 */
        $constructor = $reflector->getConstructor();

        // 若无构造函数，直接实例化并返回
        if (is_null($constructor)) {
            return new $className;
        }

        /** @var array $parameters 取构造函数参数,通过 ReflectionParameter 数组返回参数列表 */
        $parameters = $constructor->getParameters();

        // 递归解析构造函数的参数
        $dependencies = $this->getDependencies($parameters);

        // 创建一个类的新实例，给出的参数将传递到类的构造函数。
        return $reflector->newInstanceArgs($dependencies);
    }

    /**
     * @param array $parameters
     * @return array
     * @throws \Exception
     */
    public function getDependencies(array $parameters)
    {
        $dependencies = [];

        /** @var \ReflectionParameter $parameter */
        foreach ($parameters as $parameter) {
            /** @var \ReflectionClass $dependency */
            $dependency = $parameter->getClass();

            if (is_null($dependency)) {
                // 是变量,有默认值则设置默认值
                $dependencies[] = $this->resolveNonClass($parameter);
            } else {
                // 是一个类，递归解析
                $dependencies[] = $this->build($dependency->name);
            }
        }

        return $dependencies;
    }

    /**
     * @param \ReflectionParameter $parameter
     * @return mixed
     * @throws \Exception
     */
    public function resolveNonClass( \ReflectionParameter $parameter )
    {
        // 有默认值则返回默认值
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }

        throw new \Exception('I have no idea what to do here.');
    }
}