<?php

namespace ByTIC\Namefy\Tests\Strategies;

use ByTIC\Namefy\Name;
use ByTIC\Namefy\Strategies\ByTICStrategy;
use ByTIC\Namefy\Tests\AbstractTest;
use ByTIC\Namefy\Tests\Fixtures\Models\Payments\PurchasableRecordManager;

/**
 * Class ByTICStrategyTest
 * @package ByTIC\Namefy\Tests\Strategies
 */
class ByTICStrategyTest extends AbstractTest
{
    /**
     * @param $slug
     * @param $result
     * @dataProvider data_fromRepository
     */
    public function test_fromRepository($slug, $result)
    {
        $name = new Name();
        $strategy = new ByTICStrategy();
        self::assertSame($result, $strategy->fromRepository($slug, $name));
    }

    public function data_fromRepository(): array
    {
        return [
            ['books', 'books'],
            ['Books', 'books'],
            ['Books\Books', 'books'],
            ['Books_Chapters', 'books-chapters'],
            ['Books\Chapters\BooksChapters', 'books-chapters'],
        ];
    }

    /**
     * @param $slug
     * @param $result
     * @dataProvider data_fromModel
     */
    public function test_fromModel($slug, $result)
    {
        $name = new Name();
        $strategy = new ByTICStrategy();
        self::assertSame($result, $strategy->fromModel($slug, $name));
    }

    public function data_fromModel(): array
    {
        return [
            ['book', 'books'],
            ['Book', 'books'],
            ['Books\Book', 'books'],
            ['Books_Chapter', 'books-chapters'],
            ['Books\Chapters\BooksChapter', 'books-chapters'],
            [PurchasableRecordManager::class, 'payments'],
        ];
    }
}
