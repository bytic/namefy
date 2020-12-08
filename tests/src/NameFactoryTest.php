<?php

namespace ByTIC\Namefy\Tests;

use ByTIC\Namefy\Name;
use ByTIC\Namefy\NameFactory;
use ByTIC\Namefy\Strategies\AbstractStrategy;

/**
 * Class NameFactoryTest
 * @package ByTIC\Namefy\Tests
 */
class NameFactoryTest extends AbstractTest
{
    public function test_from()
    {
        $strategy = \Mockery::mock(AbstractStrategy::class)->makePartial();
        $strategy->shouldReceive('fromModel')->andReturn('resource');
        $strategy->shouldReceive('toModel')->andReturn('model');
        $strategy->shouldReceive('toController')->andReturn('controller');

        $name = NameFactory::from('books', 'model', $strategy);

        self::assertInstanceOf(Name::class, $name);

        self::assertSame('resource', $name->resource());
        self::assertSame('model', $name->model());
        self::assertSame('controller', $name->controller());
    }
}
