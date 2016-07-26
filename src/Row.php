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
     * Returns the data of row.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
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
