<?php

namespace ByTIC\Namefy\Tests;

use ByTIC\Namefy\Name;
use ByTIC\Namefy\NameFactory;
use ByTIC\Namefy\Strategies\AbstractStrategy;
use Mockery\Mock;

/**
 * Class NameFactoryTest
 * @package ByTIC\Namefy\Tests
 */
class NameFactoryTest extends AbstractTest
{
    public function test_from()
    {
        /** @var Mock|AbstractStrategy $strategy */
        $strategy = \Mockery::mock(AbstractStrategy::class)->makePartial();
        $strategy->shouldReceive('fromRepository')->andReturn('resource');
        $strategy->shouldReceive('toModel')->andReturn('model');
        $strategy->shouldReceive('toController')->andReturn('controller');

        $name = NameFactory::from('books', 'repository', $strategy);

        self::assertInstanceOf(Name::class, $name);

        self::assertSame('resource', $name->resource());
        self::assertSame('model', $name->model());
        self::assertSame('controller', $name->controller());
    }
}
