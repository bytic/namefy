<?php

namespace ByTIC\Namefy\Strategies;

/**
 * Class AbstractStrategy
 * @package ByTIC\Namefy\Strategies
 */
abstract class AbstractStrategy
{
    /**
     * @param $type
     * @param $value
     * @return mixed
     */
    public function from($type, $value)
    {
        $method = 'from'.ucfirst($type);
        return $this->$method($value);
    }

    /**
     * @param $name
     * @return string
     */
    abstract public function fromModel($name);

    /**
     * @param $name
     * @return string
     */
    abstract public function fromController($name);

    /**
     * @param $type
     * @param $value
     * @return mixed
     */
    public function to($type, $value)
    {
        $method = 'to'.ucfirst($type);
        return $this->$method($value);
    }

    /**
     * @param $resourceName
     * @return string
     */
    abstract public function toModel($resourceName);

    /**
     * @param $name
     * @return string
     */
    abstract public function toController($name);
}