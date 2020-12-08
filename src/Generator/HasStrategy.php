<?php

namespace ByTIC\Namefy\Generator;

use ByTIC\Namefy\Strategies\AbstractStrategy;

/**
 * Trait HasStrategy
 * @package ByTIC\Namefy\Generator
 */
trait HasStrategy
{
    /**
     * @var null|AbstractStrategy
     */
    protected $strategy = null;

    /**
     * @return AbstractStrategy|null
     */
    public function getStrategy(): ?AbstractStrategy
    {
        return $this->strategy;
    }

    /**
     * @param AbstractStrategy|string $strategy
     * @return self
     */
    public function setStrategy($strategy): self
    {
        if (is_string($strategy)) {
            $strategy = $this->newStrategy($strategy);
        }
        $this->strategy = $strategy;
        return $this;
    }

    /**
     * @param string $class
     * @return AbstractStrategy
     */
    protected function newStrategy($class): AbstractStrategy
    {
        if (!class_exists($class)) {
            $class = '\\' . dirname(AbstractStrategy::class) . $class . 'Strategy';
        }
        return new $class();
    }
}
