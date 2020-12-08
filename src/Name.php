<?php

namespace ByTIC\Namefy;

/**
 * Class Name
 * @package ByTIC\Namefy
 */
class Name
{
    protected $resource;
    protected $model;
    protected $controller;

    /**
     * @return mixed
     */
    public function resource()
    {
        $this->checkProperty('resource');
        return $this->resource;
    }

    /**
     * @param mixed $resource
     */
    public function setResource($resource): void
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function model()
    {
        $this->checkProperty('model');
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function controller()
    {
        $this->checkProperty('controller');
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @param string $name
     */
    protected function checkProperty($name)
    {
        if (isset($this->{$name}) && $this->{$name} instanceof \Closure) {
            $this->{$name} = ($this->{$name})();
        }
    }
}
