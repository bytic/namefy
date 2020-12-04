<?php

namespace ByTIC\Namefy;

/**
 * Class NameFactory
 * @package ByTIC\Namefy
 */
class NameFactory
{
    /**
     * @param $name
     * @param $type
     * @param $strategy
     */
    public static function from($name, $type, $strategy): Name
    {
        $name = new Name();
        return $name;
    }
}
