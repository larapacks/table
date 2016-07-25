<?php

namespace Larapacks\Table;

class Generator implements HtmlAttributable
{
    /**
     * The columns of the table.
     *
     * @var array
     */
    protected $columns = [];

    /**
     * The tables attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The rows of tabular data.
     *
     * @var array|mixed
     */
    protected $rows = [];

    /**
     * Adds a column to the current table.
     *
     * @param string   $name
     * @param \Closure $closure
     *
     * @return Generator
     */
    public function addColumn($name = '', \Closure $closure = null)
    {
        $column = new Column($name);

        call_user_func($closure, $column);

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

    /**
     * Sets the data to iterate over per r
     *
     * @param mixed $data
     *
     * @return Generator
     */
    public function setRows($data)
    {
        $this->rows = $data;

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
}
