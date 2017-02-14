<?php

namespace Larapacks\Table\Tests;

use Larapacks\Table\Column;
use Larapacks\Table\Builder;

class BuilderTest extends TestCase
{
    public function test_add_column()
    {
        $b = new Builder();

        $b->addColumn('column');

        $this->assertInstanceOf(Column::class, $b->getColumn('column'));
    }

    public function test_add_column_with_closure()
    {
        $b = new Builder();

        $b->addColumn('column', function (Column $column) {
           $column->setValue(function () {
               return 'Data';
           });
        });

        $b->addRow(['data...']);

        $this->assertEquals('Data', $b->getRows()[0]->getData($b->getColumns()['column']));
    }

    public function test_set_columns()
    {
        $b = new Builder();

        $b->setColumns([
            'column.1',
            'column.2',
            'column.3',
        ]);

        $this->assertCount(3, $b->getColumns());
    }

    public function test_add_row()
    {
        $b = new Builder();

        $row = ['name' => 'John Doe'];

        $b->addRow($row);

        $this->assertCount(1, $b->getRows());
        $this->assertEquals($row, $b->getRows()[0]->getData());
    }

    public function test_set_rows()
    {
        $b = new Builder();

        $rows = [
            ['name' => 'John Doe'],
            ['name' => 'Jane Doe'],
        ];

        $b->setRows($rows);

        $this->assertCount(2, $b->getRows());
        $this->assertEquals($rows[0], $b->getRows()[0]->getData());
        $this->assertEquals($rows[1], $b->getRows()[1]->getData());
    }

    public function test_is_empty()
    {
        $b = new Builder();

        $this->assertTrue($b->isEmpty());

        $b->addRow(['data...']);

        $this->assertFalse($b->isEmpty());
    }
}
