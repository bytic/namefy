<?php

namespace ByTIC\Namefy;

use ByTIC\Namefy\Strategies\AbstractStrategy;
use ByTIC\Namefy\Strategies\ByTICStrategy;

/**
 * Class Generator
 * @package ByTIC\Namefy
 */
class Generator
{
    use Generator\HasStrategy;

    /**
     * Generator constructor.
     * @param null|string|AbstractStrategy $strategy
     */
    public function __construct($strategy = null)
    {
        $strategy = (empty($strategy)) ? ByTICStrategy::class : $strategy;
        $this->setStrategy($strategy);
    }

    /**
     * @param $name
     * @param $type
     * @return Name
     */
    public function from($name, $type): Name
    {
        return NameFactory::from($name, $type, $this->getStrategy());
    }
}
