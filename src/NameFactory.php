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
     * @param $slug
     * @param $type
     * @param AbstractStrategy $strategy
     * @return Name
     */
    public static function from($slug, $type, AbstractStrategy $strategy): Name
    {
        $name = new Name();

        $resource = function () use ($slug, $type, $strategy, $name) {
            return $strategy->from($type, $slug, $name);
        };
        $name->setResource($resource);

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
                return $strategy->to('model', $name);
            }
        );

        $name->setController(
            function () use ($name, $strategy) {
                return $strategy->to('controller', $name);
            }
        );
    }
}
