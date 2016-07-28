<?php

namespace Larapacks\Table\Tests;

use Larapacks\Table\Builder;
use Larapacks\Table\Table;

class TableTest extends TestCase
{
    public function test_builder_is_created_on_construct()
    {
        $table = new Table();

        $this->assertInstanceOf(Builder::class, $table->getBuilder());
    }
}
