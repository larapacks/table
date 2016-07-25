<?php

namespace Larapacks\Table;

class Column implements HtmlAttributable
{
    /**
     * The table columns name.
     *
     * @var string
     */
    protected $name;

    /**
     * The table columns human readable name.
     *
     * @var string
     */
    protected $readable;

    /**
     * The value of the column.
     *
     * @var \Closure
     */
    protected $value;

    /**
     * The columns attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Constructor.
     *
     * @param string $name
     */
    public function __construct($name = '')
    {
        $this->setName($name);
    }

    /**
     * Sets the name of the column.
     *
     * @param string $name
     *
     * @return Column
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Returns the name of the column.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the human readable name to display in the table.
     *
     * @param mixed $name
     *
     * @return Column
     */
    public function setReadableName($name)
    {
        $this->readable = value($name);

        return $this;
    }

    /**
     * Returns the readable name to be displayed.
     *
     * @return string
     */
    public function getReadableName()
    {
        return $this->readable ?: ucwords($this->name);
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
     * Sets the value of the current column.
     *
     * @param \Closure $closure
     *
     * @return Column
     */
    public function setValue(\Closure $closure)
    {
        $this->value = $closure;

        return $this;
    }

    /**
     * @return \Closure
     */
    public function getValue()
    {
        return $this->value;
    }
}
