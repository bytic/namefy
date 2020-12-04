<?php

namespace ByTIC\Namefy;

/**
 * Class Namefy
 * @package ByTIC\Namefy
 */
class Namefy
{
    /**
     * @param null|string $name
     * @return Generator|Generator\HasStrategy|Strategies\AbstractStrategy|null
     */
    public static function strategy($name = null)
    {
        if ($name === null) {
            return static::self()->getStrategy();
        }
        return static::self()->setStrategy($name);
    }

    /**
     * @param string $name
     */
    public static function model($name)
    {
        static::from($name, 'model');
    }

    /**
     * @param string $name
     */
    public static function controller($name)
    {
        static::from($name, 'controller');
    }

    /**
     * @param string $name
     * @param string $type
     */
    protected static function from($name, $type)
    {
        static::self()->from($name, $type);
    }

    protected static function self(): Generator
    {
        static $instance;
        if (!($instance instanceof Generator)) {
            $instance = new Generator();
        }
        return $instance;
    }
}
