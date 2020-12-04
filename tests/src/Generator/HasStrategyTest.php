<?php

namespace ByTIC\Namefy\Tests\Generator;

use ByTIC\Namefy\Generator;
use ByTIC\Namefy\Strategies\ByTICStrategy;
use ByTIC\Namefy\Tests\AbstractTest;

/**
 * Class HasStrategyTest
 * @package ByTIC\Namefy\Tests\Generator
 */
class HasStrategyTest extends AbstractTest
{
    public function test_autoinit_generator()
    {
        $generator = new Generator();
        $strategy = $generator->getStrategy();
        self::assertInstanceOf(ByTICStrategy::class, $strategy);
    }
}
