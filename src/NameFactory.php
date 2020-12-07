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

        static::addCallbacks($name, $resource, $strategy);

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
     * @param $resource
     * @param $strategy
     */
    protected static function addCallbacks(Name &$name, $resource, $strategy)
    {
        $name->setModel(
            function () use ($resource, $strategy) {
                return $strategy->to('model', $resource);
            }
        );

        $name->setController(
            function () use ($resource, $strategy) {
                return $strategy->to('controller', $resource);
            }
        );
    }
}
