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
     * @return Name
     */
    public static function model($name): Name
    {
        return static::from($name, 'model');
    }

    /**
     * @param string $name
     * @return Name
     */
    public static function controller($name): Name
    {
        return static::from($name, 'controller');
    }

    /**
     * @param string $name
     * @param string $type
     * @return Name
     */
    protected static function from(string $name, $type): Name
    {
        return static::self()->from($name, $type);
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
