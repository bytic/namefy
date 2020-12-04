<?php

namespace ByTIC\Namefy\Tests;

use PHPUnit\Framework\TestCase;
use Mockery as m;

/**
 * Class AbstractTest
 */
abstract class AbstractTest extends TestCase
{
    use m\Adapter\Phpunit\MockeryPHPUnitIntegration;

}
