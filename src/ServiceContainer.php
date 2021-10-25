<?php

namespace SONFin;

use Pimple\Container;

class ServiceContainer extends Container implements ServiceContainerInterface
{
    private $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function add(string $name, $servico)
    {
        $this->container[$name] = $servico;
    }

    public function addLazy(string $name, callable $callable)
    {
        $this->container[$name] = $this->container->factory($callable);
    }

    public function get(string $name)
    {
        return $this->container->get($name);
    }

    public function has(string $name)
    {
        return $this->container->has($name);
    }
}