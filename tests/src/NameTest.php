<?php

namespace ByTIC\Namefy\Tests;

use ByTIC\Namefy\Name;

/**
 * Class NameTest
 * @package ByTIC\Namefy\Tests
 */
class NameTest extends AbstractTest
{
    public function test_property_with_closure()
    {
        $name = new Name();
        $name->setModel(
            function () {
                return 'post';
            }
        );

        self::assertIsString($name->model());
        self::assertSame('post', $name->model());
    }
}