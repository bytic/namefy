<?php

namespace ByTIC\Namefy\Tests\Strategies;

use ByTIC\Namefy\Strategies\ByTICStrategy;
use ByTIC\Namefy\Tests\AbstractTest;

/**
 * Class ByTICStrategyTest
 * @package ByTIC\Namefy\Tests\Strategies
 */
class ByTICStrategyTest extends AbstractTest
{
    /**
     * @param $name
     * @param $result
     * @dataProvider data_fromModel
     */
    public function test_fromModel($name, $result)
    {
        $strategy = new ByTICStrategy();
        self::assertSame($result, $strategy->fromModel($name));
    }

    public function data_fromModel(): array
    {
        return [
            ['books', 'books'],
            ['Books', 'books'],
            ['Books\Books', 'books'],
            ['Books_Chapters', 'books-chapters'],
            ['Books\Chapters\BooksChapters', 'books-chapters'],
        ];
    }
}