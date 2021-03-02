<?php

namespace ByTIC\Namefy\Strategies;

use ByTIC\Namefy\Name;

/**
 * Class ByTICStrategy
 * @package ByTIC\Namefy\Strategies
 */
class ByTICStrategy extends AbstractStrategy
{
    /**
     * @param $slug
     * @param Name $name
     * @return string
     */
    public function fromRepository($slug, Name $name)
    {
        $slug = $this->cleanModelNamespace($slug);

        return inflector()->unclassify($slug);
    }

    /**
     * @inheritDoc
     */
    public function fromModel($slug, Name $name): string
    {
        $slug = $this->cleanModelNamespace($slug);
        $slug = inflector()->unclassify($slug);
        return inflector()->pluralize($slug);
    }

    public function fromController($slug, Name $name)
    {
        // TODO: Implement fromController() method.
    }

    /**
     * @inheritDoc
     */
    public function toRepository(Name $name): string
    {
        // TODO: Implement toRepository() method.
    }

    /**
     * @inheritDoc
     */
    public function toModel(Name $name): string
    {
        return $name;
    }

    /**
     * @inheritDoc
     */
    public function toController(Name $name): string
    {
        return $name->resource();
    }

    protected function cleanModelNamespace($name): string
    {
        if (strpos($name, '\\') === false) {
            return $name;
        }
        if (method_exists($name, 'getRootNamespace')) {
            $name = str_replace((new $name())->getRootNamespace(), '', $name);
        }

        $name = trim($name, '\\');
        $parts = explode('\\', $name);
        array_pop($parts);

        $name = implode('\\', $parts);
        return $name;
    }
}
