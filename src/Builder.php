<?php

namespace Larapacks\Table;

use Closure;

class Builder implements HtmlAttributable
{
    /**
     * The columns of the table.
     *
     * @var array
     */
    protected $columns = [];

    /**
     * The rows of tabular data.
     *
     * @var array|mixed
     */
    protected $rows = [];

    /**
     * The tables attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The message to display when no records are present.
     *
     * @var string
     */
    protected $empty;

    /**
     * Sets the columns on the current table.
     *
     * @param array $columns
     *
     * @return Builder
     */
    public function setColumns($columns = [])
    {
        foreach ($columns as $name => $closure) {
            $closure instanceof Closure ?
                $this->addColumn($name, $closure) :
                $this->addColumn($closure);
        }

        return $this;
    }

    /**
     * Adds a column to the current table.
     *
     * @param string   $name
     * @param Closure  $closure
     *
     * @return Builder
     */
    public function addColumn($name = '', Closure $closure = null)
    {
        $column = new Column($name);

        // If there's a closure, we'll call it and pass in the new column.
        ! $closure ?: call_user_func($closure, $column);

        $this->columns[$name] = $column;

        return $this;
    }

    /**
     * Returns the tables columns.
     *
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Sets the rows to iterate over.
     *
     * @param mixed $data
     *
     * @return Builder
     */
    public function setRows($data = [])
    {
        $rows = [];

        foreach ($data as $record) {
            $rows[] = new Row($record);
        }

        $this->rows = $rows;

        return $this;
    }

    /**
     * Adds a row to the current table.
     *
     * @param mixed   $data
     * @param Closure $closure
     *
     * @return Builder
     */
    public function addRow($data = [], Closure $closure = null)
    {
        $row = new Row($data);

        ! $closure ?: call_user_func($closure, $row);

        $this->rows[] = $row;

        return $this;
    }

    /**
     * Returns the rows of data.
     *
     * @return mixed
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * Sets the message to display when no records are present.
     *
     * @param string $empty
     *
     * @return Builder
     */
    public function setEmpty($empty)
    {
        $this->empty = $empty;

        return $this;
    }

    /**
     * Returns the message to display when no records are present.
     *
     * @return string
     */
    public function getEmpty()
    {
        return $this->empty ?: trans(config('table.empty', 'There are no records to display.'));
    }

    /**
     * {@inheritdoc}
     */
    public function setAttributes(array $attributes = [])
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function getHtmlAttributes()
    {
        return HtmlHelper::attributes($this->attributes);
    }
}
