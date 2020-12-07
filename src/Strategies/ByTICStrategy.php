<?php

namespace ByTIC\Namefy\Strategies;

/**
 * Class ByTICStrategy
 * @package ByTIC\Namefy\Strategies
 */
class ByTICStrategy extends AbstractStrategy
{
    /**
     * @inheritDoc
     */
    public function fromModel($name): string
    {
        if (strpos($name, '\\') !== false) {
            $name = trim($name, '\\');
            $parts = explode('\\', $name);
            array_pop($parts);

            $name = implode('\\', $parts);
        }

        return inflector()->unclassify($name);
    }

    public function fromController($name)
    {
        // TODO: Implement fromController() method.
    }

    public function toModel($resourceName): string
    {
        return $resourceName;
    }

    public function toController($resourceName): string
    {
        return $resourceName;
    }
}
