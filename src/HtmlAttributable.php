<?php

namespace Larapacks\Table;

interface HtmlAttributable
{
    /**
     * Retrieves the tables attributes.
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes);

    /**
     * Retrieves the objects attributes.
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Retrieves the objects attributes in HTML form.
     *
     * @return string
     */
    public function getHtmlAttributes();
}
