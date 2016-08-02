<?php

namespace Larapacks\Table;

class Row implements HtmlAttributable
{
    /**
     * The data for the current row.
     *
     * @var array
     */
    protected $data = [];

    /**
     * The attributes for the row.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Constructor.
     *
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->setData($data);
    }

    /**
     * Sets the data for the row.
     *
     * @param array $data
     *
     * @return Row
     */
    public function setData($data = [])
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Returns the data of the specified column.
     *
     * If no column is given, then all row data is returned.
     *
     * @param Column $column
     *
     * @return mixed
     */
    public function getData(Column $column = null)
    {
        if (is_null($column)) {
            // If were not given a column, we'll return all the row data.
            return $this->data;
        }

        if ($column->getValue()) {
            // If the column has a closure, we'll pass in our
            // data into it and let the developer
            // return what they want.
            return call_user_func($column->getValue(), $this->data);
        }

        $key = $column->getName();

        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function setAttributes(array $attributes)
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
