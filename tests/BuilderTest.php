<?php

namespace Larapacks\Table\Tests;

use Larapacks\Table\Builder;
use Larapacks\Table\Column;

class BuilderTest extends TestCase
{
    public function test_add_column()
    {
        $builder = new Builder();

        $builder->addColumn('column');

        $this->assertInstanceOf(Column::class, $builder->getColumn('column'));
    }

    public function test_set_columns()
    {
        $builder = new Builder();

        $builder->setColumns([
            'column.1',
            'column.2',
            'column.3',
        ]);

        $this->assertCount(3, $builder->getColumns());
    }
}
