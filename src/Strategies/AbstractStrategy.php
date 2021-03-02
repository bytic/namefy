<?php

namespace ByTIC\Namefy\Strategies;

use ByTIC\Namefy\Name;

/**
 * Class AbstractStrategy
 * @package ByTIC\Namefy\Strategies
 */
abstract class AbstractStrategy
{
    /**
     * @param $type
     * @param $value
     * @param Name $name
     * @return mixed
     */
    public function from($type, $value, Name $name)
    {
        $method = 'from' . ucfirst($type);
        return $this->$method($value, $name);
    }

    /**
     * @param $slug
     * @return string
     */
    abstract public function fromRepository($slug, Name $name);

    /**
     * @param $slug
     * @return string
     */
    abstract public function fromModel($slug, Name $name);

    /**
     * @param $slug
     * @return string
     */
    abstract public function fromController($slug, Name $name);

    /**
     * @param $type
     * @param $value
     * @return mixed
     */
    public function to($type, $value)
    {
        $method = 'to' . ucfirst($type);
        return $this->$method($value);
    }

    /**
     * @param Name $name
     * @return string
     */
    abstract public function toModel(Name $name);

    /**
     * @param Name $name
     * @return string
     */
    abstract public function toController(Name $name);

    /**
     * @param Name $name
     * @return string
     */
    abstract public function toRepository(Name $name);
}
