<?php

namespace ByTIC\Namefy;

use ByTIC\Namefy\Strategies\AbstractStrategy;

/**
 * Class NameFactory
 * @package ByTIC\Namefy
 */
class NameFactory
{
    /**
     * @param $name
     * @param $type
     * @param AbstractStrategy $strategy
     * @return Name
     */
    public static function from($name, $type, AbstractStrategy $strategy): Name
    {
        $resource = function () use ($name, $type, $strategy) {
            return $strategy->from($type, $name);
        };
        $name = static::newName($resource);

        static::addCallbacks($name, $strategy);

        return $name;
    }

    /**
     * @param $resource
     * @return Name
     */
    protected static function newName($resource): Name
    {
        $name = new Name();
        $name->setResource($resource);
        return $name;
    }

    /**
     * @param Name $name
     * @param $strategy
     */
    protected static function addCallbacks(Name &$name, $strategy)
    {
        $name->setModel(
            function () use ($name, $strategy) {
                return $strategy->to('model', $name->resource());
            }
        );

        $name->setController(
            function () use ($name, $strategy) {
                return $strategy->to('controller', $name->resource());
            }
        );
    }
}
