<?php

namespace ByTIC\Namefy\Strategies;

/**
 * Class AbstractStrategy
 * @package ByTIC\Namefy\Strategies
 */
abstract class AbstractStrategy
{
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
}